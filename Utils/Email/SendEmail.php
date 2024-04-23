<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aviso Importante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff6347;
            text-align: center;
        }

        p {
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';




function CarregarEmailTemplat($email, $data_hora_locacao, $body)
{
    $mail = new PHPMailer(true);

    $email_user = $email;
    $data_hora_locacao = $data_hora_locacao;
    $bodyTemplate = $body;

    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->CharSet = "utf-8";
        $mail->Username = '';
        $mail->Password = '4b603894d42db4';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;
        $mail->setFrom('danielmartinsjob@gmail.com', 'Aviso Importante ⚠️');
        $mail->addAddress($email_user, 'Daniel');

        $sucesso = '
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff6347;
            text-align: center;
        }

        p {
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
        }
    </style>
        <body>
    <div class="container">
        <h1>Aviso Importante ⚠️</h1>
        <p>Olá ' . $email_user . ',</p>
        <p>Este é um aviso importante. Você precisa entregar o carro até as ' . $data_hora_locacao . '</p>
        <img width="400" heigth="400" src="https://compras.wiki.ufsc.br/images/a/a6/Avisoimportante.png" alt="Aviso Importante">

        <p>Atenciosamente,<br>
            Equipe SLveículos 🚘</p>
    </div>
</body>';

        $mail->isHTML(true);
        $mail->Subject = $bodyTemplate === "" ? 'Aviso Importante ⚠️' : 'Aviso Importante Para ' . $email . ' ⚠️';
        $mail->Body =  $bodyTemplate === "" ? $sucesso : $bodyTemplate;
        $mail->AltBody = 'Este é um aviso importante.';

        $mail->send();


        echo $sucesso;

        // echo 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro: E-mail não enviado. Error PHPMailer: {$mail->ErrorInfo}";
    }
}

if (isset($_POST["tmp"]) && $_POST["tmp"] === "") {
    echo "Usando Com Template";
    CarregarEmailTemplat($_POST['email'], $_POST['data_hora_locacao'], "");
    // echo $_POST['email']; echo$_POST['data_hora_locacao']; echo false;
} else {
    echo "Usando Sem Template";
    CarregarEmailTemplat($_POST['email'], $_POST['data_hora_locacao'], $_POST['body']);
    // echo $_POST['email']; echo$_POST['data_hora_locacao']; echo
    // $_POST['body'];
}

?>



</html>