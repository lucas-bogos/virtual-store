<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use source\adapter\mail\Mail;
use source\application\ports\PHPMailerService;
use source\application\repositories\demand\CreateDemand;
use source\application\repositories\demand\DataForPurchase;
use source\application\repositories\user\GetUser;
use source\shared\utils\FilterInput;

class DemandController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $paymentMethod = FilterInput::clean('payment');

            $email = $_SESSION['user_email'];
            $user = GetUser::byEmail($email);
            $idUser = $user[0]['id_user'];

            $idPrePurchase = DataForPurchase::get($idUser);

            CreateDemand::save($idPrePurchase, $paymentMethod);

            $routeParser = RouteContext::fromRequest($request)->getRouteParser();
            $url = $routeParser->urlFor('pedido');

            return $response->withHeader('Location', $url)->withStatus(302);
        }

        return $view->render($response, 'pedido.twig', [
            'title' => 'Pedidos do usuário - Virtual Store',
            'breadcrumb' => 'Pedidos do usuário',
        ]);
    }
}
