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
</head>

<body>
  <?php
  include("../model/nav.php");
  ?>

  <!-- Começo do bloco de conteudo -->
  <div class="container position-relative">
    <h3 class="text-center fw-light">Questão 1</h3>
    <h4 class="text-center fw-light">Nível: <a href="#">iniciante</a> - 100 pontos</h4>
    
    
    <form class="text-center lh-lg mt-5" method="get">
      <div class="row row-cols-5 justify-content-center">
        <div class="col" style="width:7%;">
          <input type="number" class="form-control">
        </div>
        <div class="col text-start">
          <label class="form-label">
            <h2><a class="atomo" data-bs-toggle="popover" title="Átomo" href="#">C</a><a class="qtdAtomo"
                data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a><a class="atomo"
                data-bs-toggle="popover" title="Átomo" href="#">H</a><a class="qtdAtomo" data-bs-toggle="popover"
                title="Quantidade de átomos" href="#">12</a><a class="atomo" data-bs-toggle="popover" title="Átomo"
                href="#">O</a><a class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a>
            </h2>
          </label>
        </div>
        <div class="col">
          <h1>-></h1>
        </div>
        <div class="col" style="width:7%;">
          <input type="number" class="form-control border">
        </div>
        <div class="col text-start">
          <label class="form-label">
            <h2><a class="atomo" data-bs-toggle="popover" title="Átomo" href="#">C</a><a class="qtdAtomo"
                data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a><a class="atomo"
                data-bs-toggle="popover" title="Átomo" href="#">H</a><a class="qtdAtomo" data-bs-toggle="popover"
                title="Quantidade de átomos" href="#">12</a><a class="atomo" data-bs-toggle="popover" title="Átomo"
                href="#">O</a><a class="qtdAtomo" data-bs-toggle="popover" title="Quantidade de átomos" href="#">6</a>
            </h2>
          </label>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <button type="submit" class="w-25 btn btn-dark">Enviar</button>
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