<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Es mejor requerir el autoload fuera de la clase

class MailSender
{
    // Definir constantes para los detalles de configuración SMTP
    private const SMTP_HOST = 'smtp.mailtrap.io';
    private const SMTP_USER = '9e65de019069a9';
    private const SMTP_PASSWORD = '********5069';
    private const SMTP_SECURE = 'tls';
    private const SMTP_PORT = 2525;
    private const MAIL_FROM = 'admin@herazodv.com';
    private const MAIL_FROM_NAME = 'HerazoDEV.com';

    public static function sendActivationEmail($email, $nombre, $hash)
    {
        try {
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = self::SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = self::SMTP_USER;
            $mail->Password = self::SMTP_PASSWORD;
            $mail->SMTPSecure = self::SMTP_SECURE;
            $mail->Port = self::SMTP_PORT;

            // Configurar el contenido del correo
            $mail->setFrom(self::MAIL_FROM, self::MAIL_FROM_NAME);
            $mail->addAddress($email, $nombre); // Añade al destinatario
            $mail->Subject = 'Activación de cuenta';

            // Habilitar HTML y definir el juego de caracteres
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido del correo
            $contenido = "<html><body><p>Hola, {$nombre}.<br>Por favor, activa tu cuenta haciendo clic en el siguiente enlace: <a href='http://localhost/proyectos%20de%20ptractica/PROY1/model/activar-user.php?email={$email}&hash={$hash}'>Activar Cuenta</a></p></body></html>";
            $mail->Body = $contenido;

            // Enviar el correo
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
