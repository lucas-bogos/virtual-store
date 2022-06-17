<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\adapter\mail\Mail;
use source\application\ports\PHPMailerService;
use source\shared\utils\FilterInput;

class ForgotPasswordController
{
    public array $data = [];

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = FilterInput::clean('email', FILTER_SANITIZE_EMAIL);

            $token = substr(md5($email), 0, 15);

            $emailAdmin = 'lucas-bogos@hotmail.com';
            $message = '
                <h2>Recupere sua senha agora</h2>
                <a href="http://127.0.0.1:8080/alteracao-de-senha?token='. $token .'">http://127.0.0.1:8080/alteracao-de-senha?token='. $token .'</a>
                <br/><br/><strong><em>Equipe Virtual Store.</em></strong>
            ';

            $_SESSION['token_forgot_pass'] = $token;
            $_SESSION['user_email'] = $email;

            $PHPMailerService = Mail::factory(new PHPMailerService());
            
            $hasSent = $PHPMailerService->send(
                $emailAdmin,
                $email,
                'Token para recuperar senha',
                $message
            );

            $this->data['sentEmail'] = $hasSent ? 'true' : 'false';
        }

        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        return $view->render($response, 'esqueci-senha.twig', $this->data);
    }
}
