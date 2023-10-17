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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Página Inicial</title>
  <link rel="stylesheet" href="../static/css/style.css">
  <style>
    /*tirar o icone do input */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body>
  <?php
  include("../model/nav.php");
  if (!isset($_GET["modo"])) {
    die('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></symbol></svg><div class="container alert alert-danger d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><div>
      Um erro aconteceu, por favor, volte à <a href="index.php">página inicial</a>!
    </div></div>');
  }
  ?>
  <!-- Começo do bloco de conteudo -->
  <div class="container position-relative">
    <?php
    if (isset($_GET['erro']) and $_GET['erro'] == "1") {
      echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
      <div id="erro" class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Você precisa preencher todas as respostas!
        </div>
      </div>';
    }
    ?>
    <h4 class="text-center fw-light">Nível:
      <?php include("../model/modos_jogo.php");
      echo $tarefa["nivel"] . " - " . $tarefa["pontos"] . " pontos"; ?>
    </h4>

    <form class="text-center lh-lg mt-5" action='../controller/validar_resposta.php'>
      <div class="row row-cols-5 justify-content-center">
        <div class="col" style="width:7%;">
          <input name="resposta_reagente" type="number" id="resposta_reagente" class="form-control">
        </div>
        <div class="col text-start">
          <label class="form-label">
            <h2>
              <?php
              $formula = array_filter(str_split($formula));
              $reagente = [];
              for($i = 0; $i < count($formula); $i++) {
                if (ctype_digit($formula[$i]) and $formula[$i] != "-" or $formula[$i] == "+") {
                  echo '<a class="qtdAtomo">' . $formula[$i] . "</a>";
                  //aqui faço a validação de se a chave é um número e se o átomo anterior ja esta "settado", e assim possa somar a quantidade correta a ele
                  if (ctype_digit($formula[$i])) {
                    if(array_key_exists($formula[$i - 1], $reagente)){
                      $reagente[$formula[$i-1]] += intval($formula[$i])-1;
                    }
                  }
                }
                if (ctype_alpha($formula[$i])) {
                  echo '<a class="atomo">' . $formula[$i] . "</a>";
                  if (isset($reagente[$formula[$i]])) {
                    $reagente[$formula[$i]]++;
                  } else {
                    $reagente[$formula[$i]] = 1;
                  }
                }
                if ($formula[$i] == '-') {
                  $posicao = array_search("-", $formula);
                  break;
                }
              }
              ?>
            </h2>
          </label>
        </div>
        <div class="col">
          <h1>-></h1>
        </div>
        <div class="col" style="width:7%;">
          <input type="number" name="resposta_produto" class="form-control border">
        </div>
        <div class="col text-start">
          <label class="form-label">
            <h2>
              <?php
              $produto = [];
              for ($i = $posicao + 1; $i < count($formula); ++$i) {
                if (!ctype_alpha($formula[$i]) and $formula[$i] != "-") {
                  echo '<a class="qtdAtomo">' . $formula[$i] . "</a>";
                  if (ctype_digit($formula[$i])) {
                    if(array_key_exists($formula[$i - 1], $produto)){
                      $produto[$formula[$i-1]] += intval($formula[$i])-1;
                    }
                  }
                }
                if (ctype_alpha($formula[$i])) {
                  echo '<a class="atomo">' . $formula[$i] . "</a>";
                  if (isset($produto[$formula[$i]])) {
                    $produto[$formula[$i]]++;
                  } else {
                    $produto[$formula[$i]] = 1;
                  }
                }
              }
              ?>
            </h2>

          </label>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <button type="submit" class="w-25 botao">Enviar</button>
      </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>

</html>
<script type="text/javascript">
  // ativar o popper (biblioteca para o titulo do botao)
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
</script>

</html>
</body>

</html>