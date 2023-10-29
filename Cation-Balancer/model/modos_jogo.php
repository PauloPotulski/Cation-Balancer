<?php
include("../controller/conexao.php");
$sql = "SELECT * FROM tarefa WHERE nivel = '" . $_GET["modo"] . "'";
$tarefa = mysqli_query($conexao, $sql)->fetch_assoc();
$arquivo = file($tarefa["diretorio"]);
$random = rand(0, count($arquivo) - 1);
$formula = $arquivo[$random];
setcookie("formula", serialize($formula), time() + 900, "/");
setcookie("tarefa", serialize($tarefa), time() + 900,"/");
?>