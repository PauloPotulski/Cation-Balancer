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
  <title>Jogar</title>
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

    .label_formula {
      display: block;
      width: 100%;
    }
  </style>
</head>

<body>
  <?php
  include("../model/nav.php");
  //o ob_start é um metodo que "segura" as informações para o site nao enviar dados de forma prematura e acabar em erros
  ob_start();
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
    if (isset($_GET["status"]) and $_GET["status"] == "vitoria" and isset($_COOKIE["vitoria"])) {
      setcookie($_COOKIE["vitoria"], null, -1, "/");
      $tarefa = unserialize($_COOKIE["tarefa"]);
      if (isset($_SESSION["id_usuario"])) {
        $sql = "UPDATE usuario SET pontos = pontos + " . $tarefa['pontos'] . " WHERE id_usuario = " . $_SESSION["id_usuario"];
        mysqli_query($conexao, $sql);
      }
      die('<div class="container">
      <h1 class="fw-light text-center">Isso ai!</h1>
      <p class="text-center">Parabéns, você ganhou ' . $tarefa["pontos"] . ' pontos!</p>
      <img class="mx-auto d-block" src="../static/img/gato-feliz1.png">
      <p class="text-center mt-5 mb-0">Você pode <a href="../controller/continuar.php">continuar</a> ou ir ao <a href="index.php">menu principal</a>.</p>
    </div>');
    }
    if (isset($_GET['status']) and $_GET['status'] == "derrota") {
      $numero = mt_rand(1, 4);
      die('<div class="container">
      <h1 class="fw-light text-center">Opss!!</h1>
      <p class="text-center">Ah não! você errou!</p>
      <img class="mx-auto d-block" src="../static/img/gato-triste' . $numero . '.png">
      <p class="text-center mt-5 mb-0">Você não balanceou as equações</p>
      <p class="text-center ">Mas não fique triste, você pode <a href="../controller/continuar.php">tentar de novo</a>, ou ir ao <a href="index.php">menu principal.</a></p>
    </div>');
    }
    ?>
    <h4 class="text-center fw-light">Nível:
      <?php
      //aqui faço a validação, a formula precisa ser respondida em até 15 minutos, se o usuario não responder até esse tempo ela reseta, e mesmo se recarregar ela fica lá ate o usuario perder ou ganhar
      if (isset($_COOKIE["formula"]) == false) {
        require_once("../model/modos_jogo.php");
      } else {
        $tarefa = unserialize($_COOKIE["tarefa"]);
        $formula = unserialize($_COOKIE["formula"]);
      }
      echo $tarefa["nivel"] . " - " . $tarefa["pontos"] . " pontos"; ?>
    </h4>

    <form class="text-center lh-lg mt-5" method="post" action='../controller/validar_resposta.php'>
      <div class="row align-items-center justify-content-center">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <label class="form-label">
            <h3 class="input-group">
              <?php
              $input = 0;
              $formula = array_filter(str_split($formula));
              $reagente = [];
              for ($i = 0; $i < count($formula); $i++) {

                if (ctype_digit($formula[$i]) and $formula[$i] != "-" or $formula[$i] == "+") {
                  echo '<a class="qtdAtomo">' . $formula[$i] . "</a>";
                  //aqui faço a validação de se a chave é um número e se o átomo anterior ja esta "settado", e assim possa somar a quantidade correta a ele
                  if (ctype_digit($formula[$i])) {
                    if (array_key_exists($formula[$i - 1], $reagente)) {
                      $reagente[$formula[$i - 1]] += intval($formula[$i]) - 1;
                    }
                  }
                }
                if (ctype_alpha($formula[$i])) {
                  if (ctype_lower($formula[$i + 1])) {
                    echo '<input style="width:35px;" class="form-control mx-2" name="resposta_reagente' . $input . '" type="number"  class="form-control"><a class="atomo">' . $formula[$i] . $formula[$i + 1] . "</a>";
                    $input++;
                    $i++;
                  } else {
                    echo '<input style="width:35px;" class="form-control mx-2" name="resposta_reagente' . $input . '" type="number"  class="form-control"><a class="atomo">' . $formula[$i] . "</a>";
                    $input++;
                  }
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
            </h3>
          </label>
        </div>
        <div class="col-md-2">
          <h1 class="fw-light">-></h1>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <?php
          $input = 0;
          $produto = [];

          for ($i = $posicao + 1; $i < count($formula); ++$i) {

            if (!ctype_alpha($formula[$i]) and $formula[$i] != "-") {
              echo '<h3><a class="qtdAtomo">' . $formula[$i] . "</a></h3>";
              if (ctype_digit($formula[$i])) {
                if (array_key_exists($formula[$i - 1], $produto)) {
                  $produto[$formula[$i - 1]] += intval($formula[$i]) - 1;
                }
              }
            }
            if (ctype_alpha($formula[$i])) {
              if (isset($formula[$i + 1]) and ctype_lower($formula[$i + 1])) {
                echo '<input style="width:35px; height:35px;" class="form-control mx-2" name="resposta_produto' . $input . '" type="number" class="form-control"><h3><a class="atomo">' . $formula[$i] . $formula[$i + 1] . "</a></h3>";
                $input++;
                $i++;
              } else {
                echo '<input style="width:35px; height:35px;" class="form-control mx-2" name="resposta_produto' . $input . '" type="number" class="form-control"><h3><a class="atomo">' . $formula[$i] . "</a></h3>";
                $input++;
              }
              if (isset($produto[$formula[$i]])) {
                $produto[$formula[$i]]++;
              } else {
                $produto[$formula[$i]] = 1;
              }
            }
          }
          //irei passar as informações sobre o reagente e produto através de cookies que duram 15 minutos
          
          setcookie("reagente", serialize($reagente), time() + 900, "/");
          setcookie("produto", serialize($produto), time() + 900, "/");
          ?>

        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <button type="submit" class="w-25 botao">Enviar</button>
      </div>
    </form>
    <?php
    ob_end_flush();
    ?>
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

  //função pra recarregar a página para trocar de formula
  setTimeout(function () {
    window.location.reload(true);
  }, 900000);


</script>

</html>
</body>

</html>