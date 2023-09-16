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
    <link rel="stylesheet" href="../static/css/style.css">

</head>

<body>
    <?php
    include("../model/nav.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="text-center list-group col position-relative">
                <li class="list-group-item list-group-item-action active" aria-current="true">Menu<img
                        src="../static/img/seta.png" onclick="abrir_menu()"
                        class="mt-0 btn d-sm-block d-md-none position-absolute top-0 end-0"></li>
                <button type="button" class="list-group-item list-group-item-action" onclick="trocar_menu_inf()"
                    id="informacoes">Informações</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="trocar_menu_rank()"
                    id="rank">Rank</button>
                <button type="button" class="list-group-item list-group-item-action" id="sobre" disabled>Sobre Cation
                    Balancer</button>
                    <a href="../controller/logout.php" class="list-group-item list-group-item-action" id="logout">Sair</a>
                    
            </div>

            <div class="col-md-9 container border rounded">
                <div class="d-flex flex-row"></div>
                <form>
                    <legend class="text-center bg-primary text-white rounded" id="titulo">Informações</legend>
                    <label class="picture rounded float-md-end" tabindex="0">
                        <input type="file" accept="image/*" id="pic_input" class="picture_input">
                        <span class="picture_image"></span>
                    </label>
                    <p><span class="fw-bold">Nome:</span> <span id="edit_nome"><?php echo $_SESSION["nome_usuario"]?></span><a href="#"><img src="../static/img/editar.png" class="ms-2" width="25px"></p></a>
                    <p><span class="fw-bold">Endereço de e-mail:</span> <?php echo $_SESSION["email_usuario"]?><img src="../static/img/editar.png" class="ms-2" width="25px"></p>
                    <p><span class="fw-bold">Telefone:</span><?php echo $_SESSION["telefone_usuario"]?><img src="../static/img/editar.png" class="ms-2" width="25px"></p>
                    <p><a href="#">Redefinir senha</a></p>
                    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="../static/js/script_perfil.js">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>