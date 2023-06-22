<?php 
  session_start();
  if(array_key_exists("nome_usuario", $_SESSION) == false){
    session_destroy();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Página Inicial</title>
  <link rel="stylesheet" href="../static/css/style.css">
</head>
<body>

  <?php
  include("../model/nav.php");
  ?>
  <!-- Começo do bloco de conteudo -->
  <div class="container">
    <h1 class="text-center fw-light">Bem vindo!</h1>
  </div>

  <div class="container">
    <h5 class="text-center fw-light">Vamos começar!</h5>
  </div>

  <div class="container overflow-hidden mt-5">
    <div class="row gx-5">
      <div class="col-md p-5">
        <div class="p-3 position-relative"><a href="learn.php"
            class="btn btn-danger position-absolute start-50 translate-middle">Aprender</a></div>
      </div>
      <div class="col-md p-5">
        <div class="p-3 position-relative"><a href="play.php"
            class="btn btn-danger position-absolute start-50 translate-middle">Jogar</a></div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
</body>

</html>