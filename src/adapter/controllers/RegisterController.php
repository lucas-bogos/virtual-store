<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\user\Register;
use source\shared\utils\FilterInput;
use source\shared\utils\JoinField;

class RegisterController
{
    public array $data = ['registed' => false];

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Dados pessoais
            $name = FilterInput::clean('name');
            $middleName = FilterInput::clean('middle-name');
            $phoneNumber = FilterInput::clean('phone-number');
            $day = FilterInput::clean('day');
            $month = FilterInput::clean('month');
            $year = FilterInput::clean('year');
            $rg = FilterInput::clean('rg');
            $cpf1 = FilterInput::clean('cpf1');
            $cpf2 = FilterInput::clean('cpf2');

            // Endereço do usuário
            $street = FilterInput::clean('street');
            $streetNumber = intval(FilterInput::clean('street-number'));
            $district = FilterInput::clean('district');
            $state = FilterInput::clean('state');
            $city = FilterInput::clean('city');
            $cep1 = FilterInput::clean('cep1');
            $cep2 = FilterInput::clean('cep2');

            // Credenciais de acesso
            $email = FilterInput::clean('email', FILTER_VALIDATE_EMAIL);
            $image = FilterInput::clean('image');
            $password = FilterInput::clean('pass');
            $passwordConfirm = FilterInput::clean('pass-confirm');

            // Formatações de campos
            $cpf = JoinField::create([$cpf1, $cpf2]);
            $zipCode = JoinField::create([$cep1, $cep2]);
            $birth = JoinField::date($day, $month, $year);
            $fullName = JoinField::create([$name, " $middleName"]);

            $register = new Register();
            $registed = false;

            if ($password == $passwordConfirm) {
                $registed = $register->registerUser(
                    $fullName,
                    $email,
                    $password,
                    $phoneNumber,
                    $birth,
                    $image,
                    $rg,
                    $cpf,
                    $street,
                    $streetNumber,
                    $district,
                    $state,
                    $city,
                    $zipCode
                );
            }
        }
        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        return $view->render($response, 'cadastro.twig', $this->data);
    }
}
