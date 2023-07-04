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
    <div class="container">
        <?php
        if (isset($_GET['success']) and $_GET['success'] == "true") {
            echo "<dialog open id='dialogo' class='border rounded'>
            <button onclick='fechar()' type='button' class='float-end btn-close' aria-label='Close'></button>
                <h3 class='fw-light text-center'>Cadastrado com sucesso!</h3>
                <hr>
                <div class='text-center'><a href='login.php'>Fazer Login</a></div>
            </dialog>";
        }
        ?>

        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <h2 class="fw-light text-center">Cadastrar-se</h2>
                <form action="../controller/validar_cadastro.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" aria-describedby="nome">
                        <div id="hintNome" class="form-text">Insira seu nome</div>
                        <?php
                        if (isset($_GET['erro']) and $_GET['erro'] == "nomeinvalido") {
                            echo "<div class='form-text text-danger'>Nome inválido, insira novamente.</div>";
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Endereço de Email</label>
                        <input type="email" placeholder="ex: gatinho.quimico@ifpr.edu.gov.br" class="form-control"
                            name="email" aria-describedby="emailHelp">
                        <div id="hintEmail" class="form-text">Utilize seu melhor email!</div>
                        <?php
                        if (isset($_GET['erro']) and $_GET['erro'] == "emailinvalido") {
                            echo "<div class='form-text text-danger'>Email inválido, insira novamente.</div>";
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha">
                        <div id="hintSenha" class="form-text">Nunca compartilhe sua senha com ninguém!</div>
                        <?php
                        if (isset($_GET['erro']) and $_GET['erro'] == "senhainvalida") {
                            echo "<div class='form-text text-danger'>Senha inválida, insira novamente.</div>";
                        }
                        ?>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark" style="width:100%;">Cadastrar-se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
<script>
    function fechar(){
        document.getElementById('dialogo').style.display = 'none';
    }
</script>
</html>