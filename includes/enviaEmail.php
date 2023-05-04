<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function enviaEmail($array) {

    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require_once("functions.php");

    $mail = new PHPMailer(); // instanciando a classe
    $mail->isSMTP(); // habilitando SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // habilitando tranferêcia segura 
    $mail->SMTPDebug = 0; // Debug Pode ser: 0 = não exibe erros, 1 = exibe erros e mensagens, 2 = apenas mensagens   
    $mail->SMTPAuth = true; // habilitando autenticação

    // Configurações para utilização do SMTP do Gmail 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; // porta gmail
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->Username = 'dawexemplo2014@gmail.com'; ////Usuário para autenticação 
    $mail->Password = 'aoetyorrmrnknqdq'; //senha autenticação
    // Remetente da mensagem - sempre usar o mesmo usuário da autenticação  
    $mail->setFrom('dawexemplo2014@gmail.com','Adm Site');
    $mail->CharSet = "utf-8";
    $email_resposta = null;
    $mail->addReplyTo($email_resposta); // Endereço para resposta
    

    $email = $array[0];
    $mensagem = $array[1];
    $assunto = $array[2];
    $mail->addAddress($email);
    $mail->Subject = $assunto; // Assunto e Corpo do email
    $mail->Body = $mensagem;

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['envio'] = true;
        $_SESSION['msg'] = "Acesse seu email para prosseguir :)";
    }

}

?>
