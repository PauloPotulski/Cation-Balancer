<?php
session_start();
#verifica se existe um nome na sessão, se houver, o software direciona para o index, senão, não
if (array_key_exists("nome_usuario", $_SESSION) == true) {
    header("Location: index.php");
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
    if(!empty($_SESSION)){
        session_destroy();
    }
    if(isset($_GET['token'])){
        session_start();
        $_SESSION['token'] = $_GET['token'];
    }
    if(isset($_GET['sucesso']) and $_GET['sucesso'] == 'true'){
        echo '<div class="alert alert-success text-center" role="alert">Senha alterada com sucesso. Clique <a href="login.php" class="alert-link">aqui</a> para fazer login</div>';
    }
    ?>
    <!-- Começo do bloco de conteudo -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <h2 class="fw-light text-center">Recuperar Senha</h2>
                <form method="post" action="../controller/validar_nova_senha.php">
                    <div class="mb-3">
                        <label for="senha" class="form-label">Digite sua nova senha</label>
                        <input type="password" class="form-control"
                            name="senha" id="senha">
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-dark" style="width:100%;">Enviar senha</button>
                    </div>
                    <?php
                        if(isset($_GET['erro']) and $_GET['erro'] == 'senhainvalida'){
                            echo "<p class='text-danger mt-3'>Digite uma senha válida</a>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</html>
</body>

</html>