<?php
setcookie("reagente",null, -1 ,"/");
setcookie("produto",null, -1 ,"/");
setcookie("formula",null, -1 ,"/");
setcookie("tarefa",null, -1 ,"/");

//pega o diretorio anterior
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
//verifica se existe
if (!empty($referer)) {
    //divido o diretorio
    $parts = parse_url($referer);
    if (isset($parts['query'])) {
        parse_str($parts['query'], $query);
        //faço a verificação pra remover os erros da url
        if (isset($query['erro'])) {
            unset($query['erro']);
        }
        if (isset($query['status'])) {
            unset($query['status']);
        }
        $novaQuery = http_build_query($query);
        $novaUrl = $parts['path'] . '?' . $novaQuery;
    }
}
if(isset($query['modo'])){
    $_GET['modo'] = $query['modo'];
}
include("../model/modos_jogo.php");
header('Location: ' . $novaUrl);

?>