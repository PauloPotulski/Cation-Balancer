<?php
session_start();
include("conexao.php");
$sql = "SELECT reset_token_expire FROM usuario WHERE reset_token = '".$_SESSION['token']."'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($result);
if($row == 1){
    $data_expira = $result->fetch_assoc()['reset_token_expire'];
    $data_atual = date("Y-m-d:H:i:s",time());
    if($data_atual > $data_expira){
        //se cair nesse bloco quer dizer que a data atual ainda pode ser recuperada a senha
        if(isset($_POST) and isset($_POST['senha'])){
            $senha = $_POST['senha'];
            if(strlen($senha) < 6){
                header("Location: ".$_SERVER['HTTP_REFERER']."&erro=senhainvalida");
            }
            else{
                $sql = "UPDATE usuario SET senha_usuario = '".$senha."' WHERE reset_token = '".$_SESSION['token']."';";
                $result = mysqli_query($conexao, $sql);
                if($result){
                    header("Location: ".$_SERVER['HTTP_REFERER']."&sucesso=true");
                }
            }
        }
    }
    else{
        echo "tempo expirado";
    }
}

?>