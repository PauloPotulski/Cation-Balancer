<?php
session_start();
if (array_key_exists("nome_usuario", $_SESSION) == false) {
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../static/img/icone.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Página Inicial</title>
  <link rel="stylesheet" href="../static/css/style.css">
</head>

<body>

  <?php
  include("../model/nav.php");
  ?>

  <!-- Começo do bloco de conteudo -->
  <div class="container">
    <h1 class="text-center fw-light">Como jogar?</h1>
    <h5 class="text-center my-5 lh-lg">Para jogar o jogo, precisamos entender o princípio sobre balanceamento químico!
    </h5>
    <p class="text-center lh-lg">Para realizar um balanceamento, é necessário nivelar a quantidade de <a>atomos</a>
      presentes no <a href="#">reagente</a> e no <a href="#">produto</a></p>
  </div>
  <div class="container">
    <div class="list-group text-center lh-lg">
      <h1 class="list-group-item"><a class="atomo" data-bs-toggle="popover" title="Átomo" href="#">C</a><a
          class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a><a class="atomo"
          data-bs-toggle="popover" title="Átomo" href="#">H</a><a class="qtdAtomo" data-bs-toggle="popover"
          title="Quantidade de átomos" href="#">12</a><a class="atomo" data-bs-toggle="popover" title="Átomo"
          href="#">O</a><a class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a> →
        Reagente</h1>
    </div>
    <div class="list-group text-center lh-lg">
      <h1 class="list-group-item">
        <a class="atomo" data-bs-toggle="popover" title="Átomo" href="#">C</a><a class="qtdAtomo"
          data-bs-toggle="popover" title="Quantidade de átomos" href="#">2</a><a class="atomo" data-bs-toggle="popover"
          title="Átomo" href="#">H</a><a class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos"
          href="#">6</a><a class="atomo" data-bs-toggle="popover" title="Átomo" href="#">O</a> + <a class="atomo"
          data-bs-toggle="popover" title="Átomo" href="#">C</a><a class="atomo" data-bs-toggle="popover" title="Átomo"
          href="#">O</a><a class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos" href="#">2</a> →
        Produto
      </h1>
    </div>
    <p class="fst-italic"><img class="me-1" src="../static/img/icone_informacao.png" width="30px">Essas fórmulas estão
      desbalanceadas!</p>
  </div>

  <div class="container">
    <p class="text-center lh-lg mt-5">Note que essa equação está desbalanceada, o <a href="#">número de átomos</a>
      presentes no reagente e no produto são diferentes </p>
    <p class="text-center lh-lg mt-5">Para realizar o balanceamento, devemos estar atentos ao número de átomos de cada
      átomo presente, então faremos a esquematização dessa equação</p>
  </div>

  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Átomo</th>
          <th scope="col">Reagente</th>
          <th scope="col">Produto</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Carbono (C)</th>
          <td>6</td>
          <td>3</td>
        </tr>
        <tr>
          <th scope="row">Hidrogênio (H)</th>
          <td>12</td>
          <td>6</td>
        </tr>
        <tr>
          <th scope="row">Oxigênio (O)</th>
          <td>6</td>
          <td>3</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="container">
    <p class="text-center lh-lg mt-5">Agora com a esquematização podemos perceber o quão simples é balancear uma
      equação, sabendo que o número de átomos do <span class="fst-italic">reagente</span> precisa ser <span
        class="fw-bold">igual</span> ao número de átomos do <span class="fst-italic">produto.</span></p>
    <p class="text-center lh-lg mt-5">Então podemos balancear essa equação adicionando um número antes da equação, esse
      número multiplicará <span class="fw-bold">todos</span> os átomos da equação (mas somente da equação, ele não
      multiplicará caso houver um sinal de + indicando outra equação, como é neste caso).</p>
    <p class="text-center lh-lg mt-5">A seguir está uma exemplificação do que foi dito anteriormente:</p>

    <h1 class="text-center fw-light">Produto</h1>
    <p class='text-center fs-5'><span class="text-danger">2</span>C2H6O + <span class="text-danger">2</span>CO2</p>
    <p class='text-center fs-5'>isso será igual a C4H12O2 + CO2 + CO2</p>
    <p class="text-center">E então temos:</p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Átomo</th>
          <th scope="col">Reagente</th>
          <th scope="col">Produto</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Carbono (C)</th>
          <td>6</td>
          <td>3 <span class="text-danger">* 2</span> = <span class="fw-bold">6</span></td>
        </tr>
        <tr>
          <th scope="row">Hidrogênio (H)</th>
          <td>12</td>
          <td>6 <span class="text-danger">* 2</span> = <span class="fw-bold">12</span></td>
        </tr>
        <tr>
          <th scope="row">Oxigênio (O)</th>
          <td>6</td>
          <td>3 <span class="text-danger">* 2</span> = <span class="fw-bold">6</span></td>
        </tr>
      </tbody>
    </table>

    <h4 class="text-center fw-light my-5">E então podemos concluir que a equação está balanceada!</h4>
    <p class="text-center">Deseja tentar um novo desafio?</p>
    <div class="p-3 position-relative"><a href="play.php?modo=iniciante"><button class="botao text-center start-50 translate-middle">Jogar</button></a></div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

  <script type="text/javascript">
    // ativar o popper (biblioteca para o titulo do botao)
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  </script>

</html>