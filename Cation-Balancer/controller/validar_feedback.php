<?php
include("conexao.php");
session_start();
if(!isset($_POST["razao"]) or $_POST["razao"] == "invalido"){
    header("Location: ../view/feedback_usuario.php?razao=invalida");
}
else{
    if($_POST["razao"] != "outro"){
        $razao = $_POST["razao"];
    }
    if($_POST["razao"] == "outro"){
        $razao = $_POST["outro"];
    }
}
if(!isset($_POST["texto"]) or strlen($_POST["texto"]) < 10){
    header("Location: ../view/feedback_usuario.php?texto=invalido");
}
else{
    $texto = $_POST["texto"];
    $sql = "INSERT INTO feedback (razao,texto, data_envio, email) VALUES ('".$razao."','".$texto."', '".date("Y-m-d")."', '".$_SESSION["email_usuario"]."')";
    if(mysqli_query($conexao, $sql)){
        header("Location: ../view/feedback_usuario.php?sucesso=true");
    }
}
?>