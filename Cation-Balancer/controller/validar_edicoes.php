<?php
include("conexao.php");
session_start();
if(empty($_POST)){
    header("Location: ../view/perfil.php?erro=preencher");
}
$qtd = 0;
$qtd_feito = 0;
if(isset($_POST) and isset($_POST['nome'])){
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $nome = preg_replace('/[0-9]/', '', $nome);
    $nome = preg_replace('/[^a-zA-Z\s]/', '',$nome);
    if(strlen($nome) < 3){
        header("Location: ../view/perfil.php?erro=nomeinvalido");
    }else{
        $qtd++;
        completar_sql("nome", $nome, $conexao, $qtd, $qtd_feito);
    }
}
if(isset($_POST) and isset($_POST['email'])){
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $qtd++;
        completar_sql("email", $email, $conexao, $qtd, $qtd_feito);
    }
    else{
        header("Location: ../view/perfil.php?erro=emailinvalido");
    }
}
if(isset($_POST) and isset($_POST['telefone'])){
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $qtd++;
    completar_sql("telefone", $telefone, $conexao, $qtd, $qtd_feito);
}
if(isset($_POST) and isset($_POST['senha'])){
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    if(strlen($senha) < 6){
        header("Location: ../view/perfil.php?erro=senhainvalida");
    }
    else{
        $qtd++;
        completar_sql("senha", $senha, $conexao, $qtd, $qtd_feito);
    }
}
if(!isset($_POST)){
    header("Location: ../view/perfil.php?erro=1");
}
function completar_sql($arg, $elemento, $conexao, $qtd, $qtd_feito){
    
    // o arg é o 'argumento' utilizado para dar update (nome, email, telefone ou senha) e o elemento é o conteudo que existe no argumento (o que é contido no nome, email, telefone ou senha)
    if($arg == "nome"){ 
        $sql = "UPDATE usuario SET nome_usuario = '".$elemento."' WHERE id_usuario = ".$_SESSION["id_usuario"].";";
        if(mysqli_query($conexao, $sql)){
            $result = mysqli_query($conexao, "select * from usuario where id_usuario = ".$_SESSION['id_usuario']."");
            $row = mysqli_num_rows($result);
            if($row == 1){
                $usuario = $result->fetch_assoc();
                $_SESSION = $usuario;
                $qtd_feito++;
            }
        }
    }
    if($arg == 'email'){
        $sql = "UPDATE usuario SET email_usuario = '".$elemento."' WHERE id_usuario = ".$_SESSION["id_usuario"].";";
        if(mysqli_query($conexao, $sql)){
            $result = mysqli_query($conexao, "select * from usuario where id_usuario = ".$_SESSION['id_usuario']."");
            $row = mysqli_num_rows($result);
            if($row == 1){
                $usuario = $result->fetch_assoc();
                $_SESSION = $usuario;
                $qtd_feito++;
            }
        }
    }
    if($arg == 'telefone'){
        $sql = "UPDATE usuario SET telefone_usuario = '".$elemento."' WHERE id_usuario = ".$_SESSION["id_usuario"].";";
        if(mysqli_query($conexao, $sql)){
            $result = mysqli_query($conexao, "select * from usuario where id_usuario = ".$_SESSION['id_usuario']."");
            $row = mysqli_num_rows($result);
            if($row == 1){
                $usuario = $result->fetch_assoc();
                $_SESSION = $usuario;
                $qtd_feito++;
            } 
        }
    }
    if($arg == "senha"){
        $sql = "UPDATE usuario SET senha_usuario = '".$elemento."' WHERE id_usuario = ".$_SESSION['id_usuario'].";";
        if(mysqli_query($conexao, $sql)){
            $result = mysqli_query($conexao, "select * from usuario where id_usuario = ".$_SESSION['id_usuario']."");
            $row = mysqli_num_rows($result);
            if($row == 1){
                $usuario = $result->fetch_assoc();
                $_SESSION = $usuario;
                $qtd_feito++;
            } 
        }
    }
    if($qtd_feito == $qtd){
        header("Location: ../view/perfil.php?sucesso=true");
    }
}
?>