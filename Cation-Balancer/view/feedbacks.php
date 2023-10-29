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
          <th scope="col">Email</th>
        </tr>
      <tbody>
        <tr>
          <?php
          include("../controller/conexao.php");
          $sql = "SELECT * FROM feedback";
          $result = mysqli_query($conexao, $sql);
          while($row = mysqli_fetch_assoc($result) ) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["razao"]."</td>";
            echo "<td>".wordwrap($row["texto"], 30, "\n", true)."</td>";
            echo "<td>".date("d/m/y",strtotime($row["data_envio"]))."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "</tr>";
          }
          ?>
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