<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\user\GetUser;
use source\application\repositories\user\SignIn;
use source\application\repositories\user\UpdatePassword;
use source\domain\valueObjects\Password;
use source\shared\utils\FilterInput;

class AlterPasswordController
{
    public array $data = [];

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $querys = $request->getQueryParams();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = FilterInput::clean('password');

            $emailFromUser = $_SESSION['user_email'];
            $client = GetUser::byEmail($emailFromUser);
            $idUser = $client[0]['id_user'];

            $tokenStoraged = $_SESSION['token_forgot_pass'];
            $tokenURL = isset($querys['token']) ? $querys['token'] : null;

            if($tokenURL == $tokenStoraged) {
                UpdatePassword::one($idUser, $password);
                $isSuccess = 'true';
            } else {
                $isSuccess = 'false';
            }

            $this->data['isSuccess'] = $isSuccess;
        }

        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        return $view->render($response, 'alteracao-de-senha.twig', $this->data);
    }
}
