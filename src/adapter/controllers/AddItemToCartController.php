<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;
use source\application\repositories\cart\AddToCart;
use source\application\repositories\user\GetUser;

class AddItemToCartController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        $args
    ) {
        $idProduct = $args['id'];
        $email = $_SESSION['user_email'];
        $user = GetUser::byEmail($email);
        $idUser = $user[0]['id_user'];
        $added = $_SESSION['user_logged']
            ? AddToCart::create($idUser, $idProduct)
            : false;

        if ($added) {
            $routeParser = RouteContext::fromRequest(
                $request
            )->getRouteParser();
            $url = $routeParser->urlFor('carrinho');

            return $response->withHeader('Location', $url)->withStatus(302);
        }
        return $response;
    }
}
