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
    if(isset($_GET['erro']) and $_GET['erro'] == 'true'){
        echo '<div class="alert alert-danger text-center" role="alert">Email ou senha incorretos</div>';
    }
    ?>
    <!-- Começo do bloco de conteudo -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <h2 class="fw-light text-center">Login</h2>
                <form method="post" action="../controller/validar_login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Endereço de Email</label>
                        <input type="email" placeholder="ex: gatinho.quimico@ifpr.edu.gov.br" class="form-control"
                            name="email" id="email" aria-describedby="emailHelp">
                        <div id="hintEmail" class="form-text">Utilize seu melhor email!</div>
                        <?php
                        if (isset($_GET['erro']) and $_GET['erro'] == "emailinvalido") {
                            echo "<div class='form-text text-danger'>Email inválido, insira novamente.</div>";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha">
                        <div id="hintSenha" class="form-text">Nunca compartilhe sua senha com ninguém!</div>
                        <?php
                        if (isset($_GET['erro']) and $_GET['erro'] == "senhainvalida") {
                            echo "<div class='form-text text-danger'>Senha inválida, insira novamente.</div>";
                        }
                        ?>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Manter-me conectado</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark" style="width:100%;">Login</button>
                    </div>
                    <div class="mt-3"><a href="../view/rec_senha.php">Esqueci minha senha.</a></div>
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