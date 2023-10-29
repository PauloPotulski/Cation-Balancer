<?php
include("conexao.php");
include("../model/ligacoes.php");
function limpar_get()
{
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
    return $novaUrl;
}
function guardar_vetor()
{
    $resposta_reagente = array();
    $resposta_produto = array();

    foreach ($_POST as $chave => $valor) {
        if (strpos($chave, 'resposta_reagente') === 0) {
            $resposta_reagente[] = $valor;
        } elseif (strpos($chave, 'resposta_produto') === 0) {
            $resposta_produto[] = $valor;
        }
    }
    return array(
        'resposta_reagente' => $resposta_reagente,
        'resposta_produto' => $resposta_produto
    );
}
function validar_vetor($vetor){
    foreach($vetor as $chave => $valor){
        if($valor == ""){
            $novaUrl = limpar_get();
            header('Location: '.$novaUrl.'&erro=1');
            exit;
        }
    }
}
$vetores = guardar_vetor();
//trago as variaveis do cookie
$reagente = unserialize($_COOKIE["reagente"]);
$produto = unserialize($_COOKIE["produto"]);


echo "<br>";
echo "reagente -> ";
print_r($reagente);
echo "<br>produto -> ";
print_r($produto);
echo "<br><br>";
$resposta_reagente = $vetores["resposta_reagente"];
$resposta_produto = $vetores["resposta_produto"];

echo "respostas reagentes -> ";
print_r($resposta_reagente);
echo "<br>";
echo "respostas produtos -> ";
print_r($resposta_produto);
echo "<br><br>";

validar_vetor($resposta_reagente);
validar_vetor($resposta_produto);


// caso esteja tudo ok com as respostas, ele faz as multiplicações
$resultado_reagente = array();
foreach ($reagente as $chave => $valorReagente) {
    $valorRespostaReagente = array_shift($resposta_reagente);
    $resultado_reagente[$chave] = $valorReagente * $valorRespostaReagente;
}
$resultado_produto = array();
foreach ($produto as $chave => $valorProduto) {
    $valorRespostaProduto = array_shift($resposta_produto);
    $resultado_produto[$chave] = $valorProduto * $valorRespostaProduto;
}


echo "resultado reagente -> ";
print_r($resultado_reagente);
echo "<br>resultado produto -> ";
print_r($resultado_produto);echo "<br><br><br>";

//aqui estarei fazendo a validação das ligações dos atomos
$validador = new validadorAtomo();
$resLigacoes = array();
$i = 0;
foreach ($resultado_reagente as $chave => $valor){
    $atomo = $chave;
    $ligacoes = $validador->validarAtomo($atomo);
    $resLigacoes[$i] = $ligacoes*$valor;
    echo "O atomo $atomo tem ".$ligacoes." ligações e com $valor $atomo temos ".$resLigacoes[$i]." ligações <br>";
    $i++;
}
if($validador->validarLigacoes($resLigacoes)){
    $reagenteBalanceado = true;
    echo '<br>Balanceado<br><br>';
}
else{
    $reagenteBalanceado = false;
    echo '<br>Desbalanceado<br><br>';
}
$resLigacoes = array();
$i = 0;
foreach ($resultado_produto as $chave => $valor){
    $atomo = $chave;
    $ligacoes = $validador->validarAtomo($atomo);
    $resLigacoes[$i] = $ligacoes*$valor;
    echo "O atomo $atomo tem ".$ligacoes." ligações e com $valor $atomo temos ".$resLigacoes[$i]." ligações <br>";
    $i++;
}
if($validador->validarLigacoes($resLigacoes)){
    $produtoBalanceado = true;
    echo '<br>Balanceado<br>';
}
else{
    $produtoBalanceado = false;
    echo '<br>Desbalanceado<br>';
}

if (array_values($resultado_reagente) == array_values($resultado_produto) and $reagenteBalanceado == true and $produtoBalanceado == true) {
    $novaUrl = limpar_get();
    setcookie("vitoria", true, time() + 30,"/");
    header("Location: ".$novaUrl."&status=vitoria");
    exit;
} else {
    $novaUrl = limpar_get();
    //se a equação e as ligações estão desabalanceadas
    if(array_values($resultado_reagente) != array_values($resultado_produto) and $reagenteBalanceado == false and $produtoBalanceado == false) {
        header("Location: ".$novaUrl."&status=derrota1");
        exit;
    }
    if(array_values($resultado_reagente) != array_values($resultado_produto) and $reagenteBalanceado == true and $produtoBalanceado == false) {
        header("Location: ".$novaUrl."&status=derrota2");
        exit;
    }
    if(array_values($resultado_reagente) != array_values($resultado_produto) and $reagenteBalanceado == false and $produtoBalanceado == true) {
        header("Location: ".$novaUrl."&status=derrota3");
        exit;
    }
    if(array_values($resultado_reagente) != array_values($resultado_produto) and $reagenteBalanceado == true and $produtoBalanceado == true) {
        header("Location: ".$novaUrl."&status=derrota4");
        exit;
    }
    if(array_values($resultado_reagente) == array_values($resultado_produto) and $reagenteBalanceado == true and $produtoBalanceado == false) {
        header("Location: ".$novaUrl."&status=derrota5");
        exit;
    }
    if(array_values($resultado_reagente) == array_values($resultado_produto) and $reagenteBalanceado == false and $produtoBalanceado == true) {
        header("Location: ".$novaUrl."&status=derrota6");
        exit;
    }
    if(array_values($resultado_reagente) == array_values($resultado_produto) and $reagenteBalanceado == false and $produtoBalanceado == true) {
        header("Location: ".$novaUrl."&status=derrota6");
        exit;
    }
}
?>