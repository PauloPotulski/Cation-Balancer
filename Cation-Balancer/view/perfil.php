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

</head>

<body>

    <?php
    include("../model/nav.php");
    ?>
    <div class="container">
        <?php
        if(array_key_exists("erro",$_GET)) {
            if($_GET['erro'] == "preencher"){
            echo '<div class="alert alert-danger text-center" id="erro-alerta" role="alert">Digite suas informações!<button type="button" class="btn-close float-end" aria-label="Close"></button></div>';
            }
        }
        if(array_key_exists("erro",$_GET)) {
            if($_GET['erro'] == "nomeinvalido"){
            echo '<div class="alert alert-danger text-center" id="erro-alerta" role="alert">Digite um nome válido!<button type="button" class="btn-close float-end" aria-label="Close"></button></div>';
            }
        }
        ?>
        <div class="row">
            <div class="text-center list-group col">
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
                <form method="post" action="../controller/validar_edicoes.php">
                    <legend class="text-center bg-primary text-white rounded" id="titulo">Informações</legend>
                    <label class="picture rounded float-md-end" tabindex="0">
                        <input type="file" accept="image/*" id="pic_input" class="picture_input">
                        <span class="picture_image"></span>
                    </label>
                    <p><span class="fw-bold">Nome:</span> <span id="edit_nome">
                            <?php echo $_SESSION["nome_usuario"] ?><img src="../static/img/editar.png" onclick="editar_nome()" style="cursor: pointer;"
                            class="ms-2 imagem_editar1" width="24px">
                        </span>
                        
                    </p>
                    <p><span class="fw-bold">Endereço de e-mail:</span>
                        <span id="edit_email">
                            <?php echo $_SESSION["email_usuario"] ?><img onclick="editar_email()" style="cursor:pointer;"
                                src="../static/img/editar.png" class="ms-2 imagem_editar2" width="24px">
                        </span>
                    </p>
                    <p><span class="fw-bold">Telefone:</span><span id="edit_tel">
                            <?php echo $_SESSION["telefone_usuario"] ?><img onclick="editar_telefone()"
                                style="cursor:pointer;" src="../static/img/editar.png" class="ms-2 imagem_editar3"
                                width="24px">
                        </span></p>
                    <p><a href="#">Redefinir senha</a></p>
                    <button type="submit" class="btn btn-primary mb-3">Salvar</button>
                </form>
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
            document.getElementById("edit_nome").innerHTML = "<div id='div_nome' class='input-group w-50'><input id='input_nome' name='nome' type='text' class='form-control  mt-2 top-0 start-0' placeholder='" + x + "'><img onclick='fechar_form("+tipo+", div_nome, edit_nome)' class='mt-3 ms-2' src='../static/img/botao-cancelar.png' style='cursor:pointer; width:25px; height:25px;'></div>";
        }
        function editar_email() {
            var x = document.getElementById("edit_email").innerText;
            document.querySelector('.imagem_editar2').style.display = 'none';
            document.getElementById("edit_email").innerHTML = "<input id='email' name='email' type='text' class='form-control w-50 mt-2' placeholder='" + x + "'>";
        }
        function editar_telefone() {
            var x = document.getElementById("edit_tel").innerText;
            document.querySelector('.imagem_editar3').style.display = 'none';
            document.getElementById("edit_tel").innerHTML = "<input id='telefone' name='telefone' type='number' class='form-control w-50 mt-2' placeholder='Telefone'>";
        }
        function fechar_form(x, div_form, span_form){
            console.log(span_form);
            span_form.innerHTML = x.placeholder;
            div_form.style.display = 'none';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>