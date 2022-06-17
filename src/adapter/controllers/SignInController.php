<?php

declare(strict_types=1);

namespace source\adapter\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use source\application\repositories\user\SignIn;
use source\domain\valueObjects\Password;
use source\shared\utils\FilterInput;

class SignInController
{
    public array $data = ['logged' => 'false'];

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = FilterInput::clean('email', FILTER_SANITIZE_EMAIL);
            $password = FilterInput::clean('password');

            $login = new SignIn();
            $result = $login->sign($email, $password);
            
            if (!$result == false) {
                $hash = $result[0]['password'];
                $isValid = Password::checkValidity($password, $hash);
                
                if ($isValid) {
                    foreach ($result as $user) {
                        $_SESSION['user_logged'] = $user['user_name'];
                        $_SESSION['user_email'] = $user['user_email'];
                        $this->data['logged'] = 'true';
                    }
                }
            }
            
            $this->data['isValid'] = !$isValid || !$result ? 'false' : 'true';
        }

        $view = Twig::fromRequest($request);
        $view->offsetSet('session', $_SESSION);
        return $view->render($response, 'login.twig', $this->data);
    }
}
