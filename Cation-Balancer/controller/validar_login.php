<?php
include("conexao.php");
if(isset($_SESSION) and isset($_SESSION['email'])){
    session_destroy();
}
session_start();
$erros = 0;
$email = mysqli_real_escape_string($conexao, Trim($_POST['email']));
#filtra o email, se a string não for email, retorna false
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    header("Location: ../view/login.php?erro=emailinvalido");
    $erros++;
}
$senha = mysqli_real_escape_string($conexao, Trim($_POST['senha']));
if (strlen($senha) < 6) {
    header("Location: ../view/login.php?erro=senhainvalida");
    $erros++;
}
#se nao existirem erros, o usuario é cadastrado
if ($erros == 0) {
    $sql = "select * from usuario where email_usuario = '$email' and senha_usuario = '$senha'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);
    if($row == 1){
        $usuario = $result->fetch_assoc();
        $_SESSION = $usuario;
        header("Location: ../view/index.php");
    }
}
else{
    header("Location: ../view/login.php");
}

$conexao->close();
?>