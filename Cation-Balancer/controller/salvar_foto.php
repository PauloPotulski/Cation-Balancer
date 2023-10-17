<?php
include("conexao.php");
session_start();
if (isset($_FILES)) {
    $foto = $_FILES['foto'];
    $fotoNova = explode('.', $foto['name']);

    if ($fotoNova[sizeof($fotoNova) - 1] != "jpg") {
        header("Location: ../view/perfil.php?erro=formato");
    } else {
        move_uploaded_file($foto['tmp_name'], "../static/img/img_usuario/" . $foto['name']);
        $sql = "UPDATE usuario SET dir_foto = '../static/img/img_usuario/" . $foto['name'] . "' where id_usuario = ".$_SESSION["id_usuario"]."";
        if(mysqli_query($conexao, $sql)){
            header("Location: ../view/perfil.php?foto=atualizada");
        }
    }
}
?>