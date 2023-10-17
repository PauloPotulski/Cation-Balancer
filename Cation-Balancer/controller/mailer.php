<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/autoload.php';

$mail = new PHPMailer(true);
try{
    //Servidor
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cationbalancer@gmail.com';
    $mail->Password = 'tspg rgku tekv gsed';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //destinatario
    $mail->setFrom('atendimento@cation.com.br', 'Atendimento Cation Balancer');
    $mail->addAddress($email);

    //Conteudo
    $mail->charset = "UTF-8";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Redefinição de senha para '.$email.'';
    $mail->Body = 'Clique <a href="../view/redefinicao_senha.php?token='.$token_hash.'">aqui</a> para redefinir sua senha';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}
catch(Exception $e){
    echo "Mensagem nao enviada: $mail->ErrorInfo";
}
?>