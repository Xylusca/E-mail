# Envio de e-mail com PHPMailer

Esse repositório contém um script simples em PHP para envio de e-mails utilizando a biblioteca PHPMailer e SMTP do Gmail (ou outro SMTP de sua escolha).

# Configuração

Para utilizar o script, siga as seguintes etapas:

1 - Clone o repositório para o seu ambiente local;

    git clone https://github.com/Xylusca/E-mail.git

2 - No terminal, navegue até a pasta onde o repositório foi clonado.

3 - Execute o comando para instalar a biblioteca PHPMailer;

    composer install

4 - Abra o arquivo dentro de 'app\communication' nome do arquivo e 'Email.php'.

5 - Preencha as informações do remetente na Credencias de acesso ao SMTP

6 - Preencha as informações do destinatário no arquivo 'enviar-email.php' na raiz do projeto.

7 - Execute o arquivo no terminal com comando 'php enviar-email.php' e será o e-mail.

# Observações

* Certifique-se de habilitar o acesso de aplicativos menos seguros na sua conta do Gmail para utilizar o SMTP do Gmail.

* Para utilizar outros serviços de SMTP, altere as informações nas variáveis '$host', '$username' e '$password' na seção "Configurações do SMTP".

* Este código foi escrito para fins de demonstração e não deve ser utilizado para envio em massa de emails sem autorização dos destinatários.

* Este código é distribuído sob a licença MIT. Sinta-se à vontade para utilizar e adaptar para seus próprios projetos.
