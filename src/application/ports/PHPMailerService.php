<?php

declare(strict_types=1);

namespace source\application\ports;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use source\application\ports\contracts\MailService;

class PHPMailerService implements MailService
{
    public function sendMail(
        string $from,
        string $to,
        string $subject,
        string $bodyContent,
        null|bool $isHTML = true,
        null|string $reply = 'no-reply@virtual-store.com.br',
        null|string $alternativeBody = null,
        null|array $attachments = null
    ): bool|null|string {
        
        $mail = new PHPMailer(true);

        try {
            // Configurações do servidor
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilita modo debugar
            $mail->isSMTP(); // Envia usando SMTP
            $mail->Host = HOST_MAIL_SERVICE; // Configura o servidor host
            $mail->SMTPAuth = SMTPAUTH; // Habilita autenticação para SMTP
            $mail->Username = USERNAME_EMAIL_ROOT; // Usuário SMTP
            $mail->Password = PASSWORD_EMAIL_ROOT; // Senha SMTP
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilita encriptografia TLS
            $mail->Port = SMTP_PORT; // Porta TCP para usar; usar 587 se configurou: `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Remetente e destinatário
            $mail->setFrom($from, 'Time Virtual Store');
            $mail->addAddress($to);
            $mail->addReplyTo($reply);

            // Anexos
            if(! empty($attachments)) {
                foreach($attachments as $attachment) {
                    $mail->addAttachment($attachment);
                }
            }

            // Conteúdo do Email
            $mail->isHTML($isHTML);
            $mail->Subject = $subject;
            $mail->Body = $bodyContent;

            // Se caso não haver compatibilidade com HTML
            if(! $alternativeBody == null) $mail->AltBody = $alternativeBody;

            $mail->send();

            return true;

            // echo "A mensagem foi enviada com sucesso! \n";

        } catch (Exception $e) {
            echo "Mensagem não pode ser enviada. Erro: {$mail->ErrorInfo} \n";
            http_response_code(500);
            return false;
            exit();
        }
    }
}
