<?php

namespace App\communication;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email
{

    /**
     * Credencias de acesso ao SMTP
     * @var array
     */
    const HOST = 'smtp.gmail.com';
    const USER = 'email_SMTP@gmail.com';
    const PASSWORD = 'senha';
    const SECURE = 'TLS';
    const PORT = 587;
    const CHARSET = 'UTF-8';

    /**
     * Dados do remetente
     * @var array
     */
    const FROM_EMAIL = 'email_SMTP@gmail.com';
    const FROM_NAME = 'smtp';

    /**
     * Mensage de erro do envio
     * @var array
     */
    private $error;

    /**
     * Método responsavel por retornar a mensagem de erro do envio
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Método responsavel por enviar um e-email
     * @param string|array $addresses
     * @param string $subject
     * @param string $body
     * @param string|array $attachments
     * @param string|array $ccs
     * @param string|array $bccs
     */
    public function sendEmail($addresses, $subject, $body, $attachments = [], $ccs = [], $bccs = [])
    {
        // LIMPAR A MENSAGEM DE ERRO
        $this->error = '';

        // INSTANCIA DE PHPMAILER
        $obMail = new PHPMailer(True);
        try {

            // CREDENCIAS DE ACESSO AO SMTP
            $obMail->isSMTP(true);
            $obMail->Host = self::HOST;
            $obMail->SMTPAuth = true;
            $obMail->Username = self::USER;
            $obMail->Password = self::PASSWORD;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port = self::PORT;
            $obMail->CharSet = self::CHARSET;

            // SSL PARAMETROS FALSE
            $obMail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            // REMETENTE
            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // DESTINATÁRIOS
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach ($addresses as $address) {
                $obMail->addAddress($address);
            }

            // ANEXOS
            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach ($attachments as $attachment) {
                $obMail->addAttachment($attachment);
            }

            // CC
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach ($ccs as $cc) {
                $obMail->addCC($cc);
            }

            // BCC
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach ($bccs as $bcc) {
                $obMail->addBCC($bcc);
            }

            // CONTEUDO DO E-MAIL
            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            // ENVIAR E-MAIL
            return $obMail->send();
        } catch (PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
