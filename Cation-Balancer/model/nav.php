<!--navbar-->
<header class="p-3 mb-3 border-bottom position-relative">
  <div class="container">
    <!--imagem do site-->
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <div class="d-flex  flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="../view/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <img class="bi me-2" src="../static/img/icone.png" width="100" height="50" role="img">
          </a>
          <!-- tópicos da nav -->
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="../view/index.php" class="nav-link px-2 link-secondary">Cation Balancer</a></li>
          </ul>
          <div class="dropdown d-flex align-items-center position-absolute end-0" style="margin-right:5%;">
            <?php
              require("../controller/conexao.php");
              if(isset($_SESSION["id_usuario"])){
              $sql = "SELECT dir_foto FROM usuario WHERE id_usuario = ".$_SESSION['id_usuario']."";
              $result = mysqli_query($conexao, $sql);
              $row = mysqli_num_rows($result);
              $foto = $result->fetch_assoc()['dir_foto'];
              if($foto != null){
                echo '<img width="40px" style="border-radius: 100%;" src="'.$foto.'" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
              }
              else{
                echo '<img width="40px" style="border-radius: 100%;" src="../static/img/foto_padrao_pefil_2.png" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
              }
            }
            else{

              echo '<img width="40px" style="border-radius: 100%;" src="../static/img/foto_padrao_pefil_2.png" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
            }
            ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <?php
              #verifica se existe um nome na sessão, se houver, ele mostra, senão, ele não mostra
              if (array_key_exists("nome_usuario", $_SESSION) == true) {
                  echo '<li><a class="dropdown-item" href="../view/perfil.php">Olá, '.$_SESSION['nome_usuario'].'</a></li>
                  <li><a class="dropdown-item" href="feedback_usuario.php">Feedback</a></li>
                  <li><a class="dropdown-item" href="../controller/logout.php">Sair</a></li>';
              } else {
                echo '<li><a class="dropdown-item" href="../view/login.php">Entrar</a></li>
                <li><a class="dropdown-item" href="../view/signup.php">Cadastrar-se</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
</header>
<!-- fim da nav -->