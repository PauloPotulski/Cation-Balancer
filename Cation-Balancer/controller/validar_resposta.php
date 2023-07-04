<?php
include("conexao.php");

if((isset($_GET["resposta_reagente"]) and $_GET["resposta_reagente"] == null) or (isset($_GET["resposta_produto"]) and $_GET["resposta_produto"] == null)){
    header("Location: ../view/play.php?erro=1");
}
?>