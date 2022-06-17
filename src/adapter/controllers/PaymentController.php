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
use source\application\repositories\user\UpdateAddress;
use source\shared\utils\FilterInput;

class PaymentController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);

        $email = $_SESSION['user_email'];
        $user = GetUser::byEmail($email);
        $address = GetUser::deliveryData($email);
        $cartItems = GetItemsFromCart::allFromUser($email);
        $dataForPurchase = DataForPurchase::get($user[0]['id_user']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $emailLogged = $_SESSION['user_email'];
            $client = GetUser::byEmail($emailLogged);
            $idUser = $client[0]['id_user'];

            $street = FilterInput::clean('street');
            $streetNumber = intval(FilterInput::clean('street-number'));
            $district = FilterInput::clean('district');
            $state = FilterInput::clean('state');
            $city = FilterInput::clean('city');
            $zipCode = FilterInput::clean('cep');
            $phoneNumber = FilterInput::clean('phone-number');
            $rg = FilterInput::clean('rg');
            $cpf = FilterInput::clean('cpf');
            $email = FilterInput::clean('email', FILTER_VALIDATE_EMAIL);

            UpdateAddress::justOne(
                $email,
                $phoneNumber,
                $rg,
                $cpf,
                $street,
                $streetNumber,
                $district,
                $state,
                $city,
                $zipCode,
                $idUser
            );

            $routeParser = RouteContext::fromRequest($request)->getRouteParser();
            $url = $routeParser->urlFor('pagamento');

            return $response->withHeader('Location', $url)->withStatus(302);
        }

        return $view->render($response, 'pagamento.twig', [
            'title' => 'Realize o pagamento de seu pedido - Virtual Store',
            'breadcrumb' => 'Pagamento de seu pedido',
            'address' => $address,
            'cart' => $cartItems,
            'dataForPurchase' => $dataForPurchase,
        ]);
    }
}
