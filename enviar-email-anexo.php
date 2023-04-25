<?php

require __DIR__ . '/vendor/autoload.php';

use \App\communication\Email;

// DESTINATARIO
$address = 'email_destinatario@gmail.com';
$subject = 'Formulario ';
$body = 'Segue anexo arquivo de teste';
$attachment = __DIR__.'/anexo-test.txt';


$obEmail = new Email;
$sucesso = $obEmail->sendEmail($address, $subject, $body, $attachment);
echo $sucesso ? 'Mensagem enviada com sucesso!' : $obEmail->getError();
