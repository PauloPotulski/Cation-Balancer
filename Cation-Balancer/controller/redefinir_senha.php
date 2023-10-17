<?php
include("conexao.php");

if(isset($_POST) and isset($_POST['email'])){
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expira = date("Y-m-d:H:i:s",time() + 60 * 30);

    $sql = "SELECT * FROM usuario WHERE email_usuario = '".$email."'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);
    if($row == 0){
        header("Location: ../view/rec_senha.php?erro=true");
    }
    else{
        $sql = "UPDATE usuario SET reset_token = '".$token_hash."', reset_token_expire = '".$expira."' WHERE email_usuario = '".$email."'";
        if(mysqli_query($conexao, $sql)){
            require __DIR__ . "/mailer.php";
            try{
                $mail->send();
                header("Location: ../view/rec_senha.php?sucesso=true");
            }
            catch(Exception $e){
                echo "Mensagem nao pode ser enviada: {$mail->ErrorInfo}";
            }
        }
    }
}
?>