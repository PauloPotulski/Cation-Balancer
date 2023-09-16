<?php
session_start();
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: ../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo '<title>' . $_SESSION['nome_usuario'] . ' - Perfil</title>';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <?php
    include("../model/nav.php");
    ?>
    <div class="container text-center">
        <div class="row">
            <div class="list-group col position-relative">
                <li class="list-group-item list-group-item-action active" aria-current="true">Menu<img src="../static/img/seta.png" onclick="abrir_menu()" class="btn d-sm-block d-md-none position-absolute top-0 end-0"></li>
                <button type="button" class="list-group-item list-group-item-action">Informações</button>
                <button type="button" class="list-group-item list-group-item-action">Rank</button>
                <button type="button" class="list-group-item list-group-item-action" disabled>Sobre Cation Balancer</button>
            </div>
            <div class="container col-md-9 bg-danger border rounded">#</div>
        </div>
        <div class="row">
            <div class="container col border rounded w-25">
                <ul class="list-group">

                </ul>
            </div>
            <div class="container col-md-9 border rounded"></div>
        </div>
    </div>
    </div>
    <script>
        function abrir_menu(){
            console.log("Deu");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"crossorigin="anonymous"></script>
</body>
</html>