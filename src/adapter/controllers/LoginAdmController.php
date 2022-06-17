<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\admin\LoginAdm;
use source\application\repositories\user\SignIn;
use source\shared\utils\FilterInput;

class LoginAdmController
{
    public array $data = ['logged' => false];

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = FilterInput::clean('email', FILTER_SANITIZE_EMAIL);
            $password = FilterInput::clean('password');

            $result = LoginAdm::check($email, $password);

            foreach ($result as $user) {
                $_SESSION['user_admin_logged'] = $user['name'];
                $_SESSION['user_admin_email'] = $user['email'];
                $this->data['logged'] = true;
            }

            $this->data['isValid'] = !$result ? 'false' : 'true';
        }

        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        
        return $view->render($response, 'login-admin.twig', $this->data);
    }
}
