<?php
include("conexao.php");
$erros = 0;
#o método mysqli_real_escape_string é responsável por validar se a string é advinda de um ataque de sql injection
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
$sql = "SELECT * from usuario where email_usuario = '$email';";
if(mysqli_num_rows(mysqli_query($conexao, $sql)) == 0) {
#se nao existirem erros e o email nao estiver cadastrado, o usuario é cadastrado
    if ($erros == 0) {
        $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) Values('$nome', '$email', '$senha');";
        if ($conexao->query($sql) === TRUE) {
            header("Location: ../view/signup.php?success=true");
        }
    }
}
else{
    header("Location: ../view/signup.php?email=cadastrado");
}


$conexao->close();
?>