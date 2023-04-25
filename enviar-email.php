<?php

require __DIR__ . '/vendor/autoload.php';

use \App\communication\Email;

// DESTINATARIO
$address = 'email_destinatario@gmail.com';
$subject = 'Formulario';
$body = 'Teste :)';
$attachment = __DIR__.'/anexo-test.txt';


$obEmail = new Email;
$sucesso = $obEmail->sendEmail($address, $subject, $body);
echo $sucesso ? 'Mensagem enviada com sucesso!' : $obEmail->getError();
