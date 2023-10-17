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
  <style>

  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Visualizar feedbacks</title>
  <link rel="stylesheet" type="text/css" href="../static/css/style.css">
</head>

<body>
  <?php
  include("../model/nav.php");
  if ($_SESSION["tipo_usuario"] != "A") {
    header("Location: index.php");
  }
  ?>
  <!-- Começo do bloco de conteudo -->
  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Razão</th>
          <th scope="col">Feedback</th>
          <th scope="col">Data</th>
        </tr>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
      </tbody>
      </thead>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>
</body>

</html>