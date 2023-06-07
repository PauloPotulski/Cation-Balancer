<?php
    $host = "localhost";
    $bd = "cation_balancer";
    $usuario = "root";
    $senha = "AdmCationBalancer";

    $conexao = new mysqli($host, $usuario, $senha, $bd);
    if($conexao->connect_errno){
        echo "Erro";
    }
?>