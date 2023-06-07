<?php
include("conexao.php");
$erros = 0;
#o método mysqli_real_escape_string é responsável por recuperar a string do envio através do post 
$nome = mysqli_real_escape_string($conexao, Trim($_POST['nome']));

#se o nome não conter mais de 2 letras, o sistema não liberará o cadastro 
if (strlen($nome) < 2) {
    header("Location: ../view/signup.php?erro=nomeinvalido");
    $erros++;
}
$email = mysqli_real_escape_string($conexao, Trim($_POST['email']));
#filtra o email, se a string não for email, retorna false
if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
    header("Location: ../view/signup.php?erro=emailinvalido");
    $erros++;
}
$senha = mysqli_real_escape_string($conexao, Trim($_POST['senha']));
if (strlen($senha) < 6) {
    header("Location: ../view/signup.php?erro=senhainvalida");
    $erros++;
}
#se nao existirem erros, o usuario é cadastrado
if ($erros == 0) {
    $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) Values('$nome', '$email', '$senha');";
    if ($conexao->query($sql) === TRUE) {
        header("Location: ../view/signup.php?success=true");
    }
}

$conexao->close();
?>