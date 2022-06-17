<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;
use source\application\repositories\cart\RemoveFromCart;

class RemoveFromCartController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $args
    ) {
        $idProduct = $args['id'];
        if ($_SESSION['user_logged']) {
            RemoveFromCart::unique($idProduct);
        }

        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('carrinho');

        return $response->withHeader('Location', $url)->withStatus(302);
    }
}
