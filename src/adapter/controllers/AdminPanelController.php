<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class AdminPanelController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        return $view->render($response, 'admin.twig', []);
    }
}
