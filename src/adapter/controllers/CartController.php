<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use source\application\repositories\cart\GetItemsFromCart;
use source\application\repositories\demand\DataForPurchase;
use source\application\repositories\user\GetUser;
use source\shared\utils\FilterInput;

class CartController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $coupon = isset($_POST['coupon-code'])
                ? FilterInput::clean('coupon-code')
                : null;
            $total = FilterInput::clean('total');

            $email = $_SESSION['user_email'];
            $user = GetUser::byEmail($email);
            $idUser = $user[0]['id_user'];

            $readyExists = DataForPurchase::exists($idUser);

            if (!$readyExists) {
                DataForPurchase::save($idUser, $coupon, $total);
            }

            if ($readyExists) {
                DataForPurchase::update($idUser, $coupon, $total);
            }

            $routeParser = RouteContext::fromRequest($request)->getRouteParser();
            $url = $routeParser->urlFor('pagamento');

            return $response->withHeader('Location', $url)->withStatus(302);
        }

        $items = GetItemsFromCart::allFromUser($_SESSION['user_email']);

        return $view->render($response, 'carrinho.twig', [
            'title' => 'Seu carrinho de compras - Virtual Store',
            'breadcrumb' => 'Seu carrinho de compras',
            'items' => $items,
        ]);
    }
}
