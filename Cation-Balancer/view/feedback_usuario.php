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
    <title>Enviar feedback</title>
    <link rel="stylesheet" type="text/css" href="../static/css/style.css">
</head>

<body>
    <?php
    include("../model/nav.php");
    if (!isset($_SESSION['email_usuario'])) {
        die('<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
  <div class="alert alert-danger d-flex align-items-center container" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
      Você precisa fazer <a href="login.php">login</a> para enviar feedbacks.
    </div>
  </div>');
    }
    ?>
    <!-- Começo do bloco de conteudo -->
    <div class="container w-50 ">
        <?php
        if (isset($_GET['sucesso']) and $_GET['sucesso'] == "true") {
            echo '<div class="alert alert-success alert-dismissible" role="alert">Feedback enviado com sucesso!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>
        <h3 class="fw-light text-center">Enviar feedback para o desenvolvedor</h3>
        <form action="../controller/validar_feedback.php" method="post">
            <div class="mb-3">
                <label class="form-label mt-4">Selecione a razão do feedback</label>
                <select id="select" name="razao" class="form-select">
                    <option id="ocultar" value="invalido" selected>Selecione uma opção.</option>
                    <option value="bug">Bug</option>
                    <option value="sugestao">Sugestão</option>
                    <option value="critica">Crítica</option>
                    <option value="outro">Outro</option>
                </select>
                <input id="outro" style="display:none;" type="text" name="outro"
                    placeholder="Digite aqui a razão para o feedback" class="form-control mt-2">
                <?php
                if (isset($_GET["razao"]) and $_GET["razao"] == "invalida") {
                    echo '<p class="text-danger">Selecione uma razão válida</p>';
                }

                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Feedback</label>
                <textarea id="text-area" name="texto" type="text" class="form-control" maxlength="500"
                    style="height:150px;"></textarea>
                <div id="quantidade" class="text-end"><span id="qtd">0</span>/500</div>
                <?php
                if (isset($_GET['texto']) and $_GET['texto'] === 'invalido') {
                    echo '<p class="text-danger">Digite um texto válido</p>';
                }
                ?>
            </div>
            <div class="text-center"><button type="submit" class="botao w-100">Enviar</button></div>
        </form>
    </div>

    <script>
        var select = document.getElementById("select");
        select.addEventListener("click", function () {
            if (select.value == "outro") {
                document.getElementById("outro").style.display = "block";
            }
            if (select.value != "outro") {
                document.getElementById("outro").style.display = "none";
            }
            if (select.value != "Selecione uma opção.") {
                document.getElementById("ocultar").setAttribute("disabled", "disabled");
            }
        });

        var text_area = document.getElementById("text-area");
        text_area.addEventListener("input", function () {
            const texto = text_area.value;
            const numero = texto.length;
            document.getElementById("qtd").innerHTML = numero;
            if (numero >= 500) {
                document.getElementById("quantidade").style.color = "red";
                text_area.ariaReadOnly = true;
            }
            else {
                document.getElementById("quantidade").style.color = "black";
                text_area.ariaReadOnly = false;
            }
        });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</html>
</body>

</html>