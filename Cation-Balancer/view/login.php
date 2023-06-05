<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><title>Página Inicial</title>
    <link rel="stylesheet" href="../static/css/style.css">
  </head>
<body>

<?php
  include("../model/nav.php");
?>
<!-- Começo do bloco de conteudo -->
<div class="container">
    <h2 class="fw-light text-center">Login</h2>
    <form>
  <div class="mb-3">
    <label for="email" class="form-label">Endereço de Email</label>
    <input type="email" placeholder="ex: gatinho.quimico@ifpr.edu.gov.br" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="hintEmail" class="form-text">Utilize seu melhor email!</div>
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Password</label>
    <input type="password" class="form-control" id="senha">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></html>
</body>
</html>