<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\product\CreateProduct;
use source\domain\entities\Product;
use source\domain\enumerations\Color;
use source\domain\enumerations\Size;
use source\shared\utils\FileUpload;
use source\shared\utils\FilterInput;

class AdminRegisterProductController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            
            $name = FilterInput::clean('nome');
            $description = FilterInput::clean('descricao');
            $photo = FileUpload::save();
            $quantity = (int) FilterInput::clean('quantidade');
            $price = (int) FilterInput::clean('preco');
            $assurance = (bool) FilterInput::clean('garantia');
            $brand = FilterInput::clean('marca');
            $barCode = FilterInput::clean('codigo');
            $color = FilterInput::clean('cor');
            $size = FilterInput::clean('tamanho');
            
            $product = new Product();
            
            $product
                ->setTitle($name)
                ->setDescription($description)
                ->setPhoto($photo)
                ->setQuantity($quantity)
                ->setPrice($price)
                ->setAssurance($assurance)
                ->setBrand($brand)
                ->setBarCode($barCode)
                ->setColor($color)
                ->setSize($size)
            ;

            $registed = CreateProduct::build($product) ? true : false;

        }

        return $view->render($response, 'cadastro-produtos.twig', [
            'registed' => $registed
        ]);
    }
}
