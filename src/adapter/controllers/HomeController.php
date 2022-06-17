<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\product\GetProducts;

class HomeController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        $querys = $request->getQueryParams();

        /**
         * Obtem os valores do parametro
         */
        $search = $querys['search'];
        $price = $querys['price'];

        if(isset($price)) {
            GetProducts::filterByPrice($price);
        }
        
        if(isset($search)) {
            $products = GetProducts::find($search);
        } elseif(isset($price)) {
            $products = GetProducts::filterByPrice($price);
        } else {
            $products = GetProducts::all();
        }

        return $view->render($response, 'home.twig', [
            'title' => 'Melhores preços - Virtual Store',
            'breadcrumb' => 'Melhores preços é aqui!',
            'products' => $products,
        ]);
    }
}
