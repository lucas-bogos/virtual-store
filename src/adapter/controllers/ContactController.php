<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\adapter\mail\Mail;
use source\application\ports\PHPMailerService;
use source\shared\utils\FilterInput;

class ContactController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = FilterInput::clean('name');
            $email = FilterInput::clean('email', FILTER_SANITIZE_EMAIL);
            $subject = FilterInput::clean('subject');
            $message = FilterInput::clean('message');

            $emailAdmin = 'lucas-bogos@hotmail.com';

            $PHPMailerService = Mail::factory(new PHPMailerService());

            $hasSent = $PHPMailerService->send(
                $email,
                $emailAdmin,
                "Nova mensagem de $name: $subject",
                $message
            );
        }

        return $view->render($response, 'contato.twig', [
            'title' =>
                'Entre em contato conosco ou confira nossas lojas - Virtual Store',
            'breadcrumb' => 'Entre em contato conosco',
            'sent' => $hasSent,
        ]);
    }
}
