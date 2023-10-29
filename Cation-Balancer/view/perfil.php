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
    <link rel="shortcut icon" href="../static/img/icone.png" type="image/x-icon">
    <?php
    echo '<title>' . $_SESSION['nome_usuario'] . ' - Perfil</title>';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../static/css/style.css">
    <style>
        .picture_input {
            display: none;
        }

        .picture {
            width: 300px;
            aspect-ratio: 16/9;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            border: dashed 2px currentColor;
            cursor: pointer;
            transition: color 300ms ease-in-out, background 300ms ease-in-out;
        }

        .picture:hover {
            color: #0d6efd;
            background-color: azure;
        }

        .picture:active {
            color: turquoise;
            background-color: turquoise;

        }

        .foto_perfil_config {
            max-width: 100%;
            object-fit: cover;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
</head>

<body>

    <?php
    include("../model/nav.php");
    ?>
    <div class="container">
        <?php
        if (isset($_GET['sucesso']) and $_GET['sucesso'] == 'true') {
            echo '<div id="alerta-fechar" class="alert alert-success text-center"  role="alert">Informações editadas com sucesso!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
        }
        if (isset($_GET['foto']) and $_GET['foto'] == "atualizada") {
            echo '<div id="alerta-fechar" class="alert alert-success text-center"  role="alert">Foto de perfil atualizada com sucesso!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
        }
        if (isset($_GET['foto']) and $_GET['foto'] == "deletada") {
            echo '<div id="alerta-fechar" class="alert alert-success text-center"  role="alert">Foto de perfil deletada com sucesso!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
        }
        if (array_key_exists("erro", $_GET)) {
            if ($_GET['erro'] == "preencher") {
                echo '<div id="alerta-fechar" class="alert alert-danger text-center" role="alert">Digite suas informações!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
                if ($_GET['erro'] == "nomeinvalido") {
                    echo '<div id="alerta-fechar" class="alert alert-danger text-center" id="alerta-fechar" role="alert">Digite um nome válido!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
                }
            }
            if ($_GET['erro'] == "emailinvalido") {
                echo '<div id="alerta-fechar" class="alert alert-danger text-center" id="alerta-fechar" role="alert">Digite um email válido!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
            }
            if ($_GET['erro'] == "senhainvalida") {
                echo '<div id="alerta-fechar" class="alert alert-danger text-center" id="alerta-fechar" role="alert">Digite uma senha válida!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
            }
            if ($_GET['erro'] == "formato") {
                echo '<div id="alerta-fechar" class="alert alert-danger text-center" id="alerta-fechar" role="alert">Somente é possível atualizar a foto sendo ela do tipo JPG!<button onclick=fechar_alert() type="button" class="btn-close float-end" aria-label="Close"></button></div>';
            }
        }

        ?>
        <div class="row">
            <div class="text-center list-group col mb-3">
                <li class="list-group-item list-group-item-action active" aria-current="true">Menu<img
                        src="../static/img/seta.png" onclick="abrir_menu()"
                        class="mt-0 btn d-sm-block d-md-none position-absolute top-0 end-0"></li>
                <button type="button" class="list-group-item list-group-item-action" onclick="trocar_menu_inf()"
                    id="informacoes">Informações</button>
                <button type="button" class="list-group-item list-group-item-action" onclick="trocar_menu_rank()"
                    id="rank">Rank</button>
                <button type="button" class="list-group-item list-group-item-action" id="sobre" disabled>Sobre Cation
                    Balancer</button>
                <?php
                    if($_SESSION["tipo_usuario"] == "A"){
                        echo '<li class="list-group-item list-group-item-action"><a href="feedbacks.php">Acessar os feedbacks dos usuários</a></li>';
                    }
                ?>
                <a href="../controller/logout.php" class="list-group-item list-group-item-action" id="logout">Sair</a>

            </div>

            <div id="div_informacoes" class="col-md-9 container border rounded">
                <div class="d-flex flex-row"></div>
                <legend class="text-center bg-primary text-white rounded" id="titulo">Informações</legend>
                <!--form para salvar a foto-->
                <form class="float-md-end" enctype="multipart/form-data" action="../controller/salvar_foto.php"
                    method="post">
                    <label class="picture rounded" tabindex="0">
                        <input name="foto" type="file" accept="image/*" id="pic_input" class="picture_input">
                        <span class="picture_image"></span>
                    </label>
                    <button class="btn btn-primary mt-2" style="width: 100%;" type="submit">Enviar</button>
                    <a href="../controller/excluir_foto.php" class="btn btn-danger mt-2 mb-2" style="width:100%;"
                        type="button" onclick="excluir_foto()">Excluir foto</a>
                </form>
                <!--form para salvar as informações-->
                <form method="post" action="../controller/validar_edicoes.php">
                    <p><span class="fw-bold">Nome:</span> <span id="edit_nome">
                            <?php echo $_SESSION["nome_usuario"] ?><img src="../static/img/editar.png"
                                onclick="editar_nome()" style="cursor: pointer;" class="ms-2 imagem_editar1"
                                width="24px">
                        </span>

                    </p>
                    <p><span class="fw-bold">Endereço de e-mail:</span>
                        <span id="edit_email">
                            <?php echo $_SESSION["email_usuario"] ?><img onclick="editar_email()"
                                style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar2"
                                width="24px">
                        </span>
                    </p>
                    <p><span class="fw-bold">Telefone:</span><span id="edit_tel">
                            <?php echo $_SESSION["telefone_usuario"] ?><img onclick="editar_telefone()"
                                style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar3"
                                width="24px">
                        </span></p>
                    <p><span class="fw-bold">Senha:</span><span id="edit_senha"><img onclick="editar_senha()"
                                style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar4"
                                width="24px"></span></p>
                    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                </form>
            </div>
            <div style="display: none;" id="div_rank" class="col-md-9 container border rounded">
                <div class="d-flex flex-row"></div>
                <legend class="text-center bg-primary text-white rounded" id="titulo">Rank</legend>
                <h1 style="font-family:'Comic Neue';" class="text-center">
                    <?php
                    include("../controller/conexao.php");
                    $sql = "SELECT pontos FROM usuario WHERE id_usuario = " . $_SESSION['id_usuario'] . "";
                    $pontos = mysqli_query($conexao, $sql)->fetch_assoc()["pontos"];
                    if ($pontos < 1000) {
                        echo "Iniciante";
                        $foto = "gato_aprendiz";
                    }
                    if ($pontos >= 1000 and $pontos < 3750) {
                        echo "Aprendiz";
                        $foto = "gato_frustrado";
                    }
                    if ($pontos >= 3750 and $pontos < 10000) {
                        echo "Avançado";
                        $foto = "gato_curioso";
                    }
                    if ($pontos >= 10000) {
                        echo "Doutor";
                        $foto = "gato_professor";
                    }
                    ?>
                </h1>
                <h4 style="font-family:'Comic Neue';" class="text-center">
                    <?php
                    echo $pontos;
                    ?> pontos
                </h4>
                <img class="mx-auto d-block mb-5" width="360px" height="250px"
                    src="../static/img/img_rank/<?php echo $foto ?>.png">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="../static/js/script_perfil.js"></script>
    <script>
        function editar_nome() {
            //aqui é onde recupero o nome atual
            var x = document.getElementById("edit_nome").innerText;
            document.querySelector(".imagem_editar1").style.display = 'none';
            var tipo = "input_nome";
            document.getElementById("edit_nome").innerHTML = "<div id='div_nome' class='input-group w-50'><input id='input_nome' name='nome' type='text' class='form-control mt-2 top-0 start-0' placeholder='" + x + "'><img onclick='fechar_form(" + tipo + ", div_nome, edit_nome)' class='mt-3 ms-2' src='../static/img/botao-cancelar.png' style='cursor:pointer; width:25px; height:25px;'></div>";
        }
        function editar_email() {
            var x = document.getElementById("edit_email").innerText;
            document.querySelector('.imagem_editar2').style.display = 'none';
            var tipo = "input_email"
            document.getElementById("edit_email").innerHTML = "<div id='div_email' class='input-group w-50'><input id='input_email' name='email' type='email' class='form-control mt-2 top-0 start-0' placeholder='" + x + "'><img onclick='fechar_form(" + tipo + ", div_email, edit_email)' class='mt-3 ms-2' src='../static/img/botao-cancelar.png' style='cursor:pointer; width:25px; height:25px;'></div>";
        }
        function editar_telefone() {
            var x = document.getElementById("edit_tel").innerText;
            document.querySelector('.imagem_editar3').style.display = 'none';
            var tipo = 'input_telefone';
            document.getElementById("edit_tel").innerHTML = "<div id='div_telefone' class='input-group w-50'><input id='input_telefone' name='telefone' type='number' class='form-control w-50 mt-2' placeholder='Telefone'><img onclick='fechar_form(" + tipo + ", div_telefone, edit_tel)' class='mt-3 ms-2' src='../static/img/botao-cancelar.png' style='cursor:pointer; width:25px; height:25px;'></div>";
        }
        function editar_senha() {
            document.querySelector('.imagem_editar4').style.display = 'none';
            var tipo = "input_senha";
            document.getElementById("edit_senha").innerHTML = "<div id='div_senha' class='input-group w-50'><input id='input_senha' name='senha' type='password' class='form-control w-50 mt-2' placeholder='Senha'><img onclick='fechar_form(" + tipo + ", div_senha, edit_senha)' class='mt-3 ms-2' src='../static/img/botao-cancelar.png' style='cursor:pointer; width:25px; height:25px;'></div>";
        }
        function fechar_form(x, div_form, span_form) {
            if (span_form.id == "edit_nome") {
                span_form.innerHTML = x.placeholder + '<img src="../static/img/editar.png" onclick="editar_nome()" style="cursor: pointer;" class="ms-2 imagem_editar1" width="24px">';
            }
            if (span_form.id == "edit_email") {
                span_form.innerHTML = x.placeholder + '<img onclick="editar_email()" style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar2" width="24px">';
            }
            if (span_form.id == "edit_tel") {
                if (x.placeholder == "Telefone") {
                    span_form.innerHTML = '<img onclick="editar_telefone()" style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar3" width="24px">';
                }
                else {
                    span_form.innerHTML = x.placeholder + '<img onclick="editar_telefone()" style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar3" width="24px">';
                }
            }
            if (span_form.id == "edit_senha") {
                span_form.innerHTML = '<img onclick="editar_senha()" style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar4" width="24px">';
            }
            div_form.style.display = 'none';
        }
        function fechar_alert() {
            document.getElementById("alerta-fechar").style.display = "none";
        }

        function trocar_menu_inf() {
            document.getElementById("div_rank").style.display = "none";
            document.getElementById("div_informacoes").style.display = 'block';
        }
        function trocar_menu_rank() {
            document.getElementById("div_rank").style.display = "block";
            document.getElementById("div_informacoes").style.display = 'none';
        }


        //desativar o enter
        document.addEventListener("keydown", function (e) {
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>