<?php
include("conexao.php");
session_start();
if(isset($_POST) and isset($_POST['nome'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    completar_sql("nome", $nome, $conexao);
}
if(isset($_POST) and isset($_POST['email'])){
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    completar_sql("email", $email, $conexao);
}
if(isset($_POST) and isset($_POST['telefone'])){
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    completar_sql("telefone", $telefone, $conexao);
}
if(!isset($_POST)){
    header("Location: ../view/perfil.php?erro=1");
}

function completar_sql($arg, $elemento, $conexao){
    if($arg == "nome"){ 
        $sql = "UPDATE usuario SET nome_usuario = '".$elemento."'";
        
        if(mysqli_query($conexao, $sql)){
            echo "deu";
        }
    }
}
?>