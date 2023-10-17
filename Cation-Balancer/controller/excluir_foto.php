<?php
include("conexao.php");
session_start();

$sql = "SELECT dir_foto FROM usuario WHERE id_usuario = ".$_SESSION['id_usuario'].";";
$result = mysqli_query($conexao, $sql);
if($result->fetch_assoc() != null){
    $sql = "UPDATE usuario SET dir_foto = NULL where id_usuario = ".$_SESSION['id_usuario'].";";
    if(mysqli_query($conexao, $sql)){
        header("Location: ../view/perfil.php?foto=deletada");
    }
}
?>