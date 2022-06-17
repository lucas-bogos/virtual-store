<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use source\adapter\controllers\AddItemToCartController;
use source\adapter\controllers\AdminRegisterProductController;
use source\adapter\controllers\AlterPasswordController;
use source\adapter\controllers\CartController;
use source\adapter\controllers\ContactController;
use source\adapter\controllers\DemandController;
use source\adapter\controllers\ForgotPasswordController;
use source\adapter\controllers\HomeController;
use source\adapter\controllers\LoginAdmController;
use source\adapter\controllers\PaymentController;
use source\adapter\controllers\RegisterController;
use source\adapter\controllers\RemoveFromCartController;
use source\adapter\controllers\SignInController;


/**
 * DIA EM SEGUNDOS = (60 * 60) * 24
 */
session_start([
    'cookie_lifetime' => 86400
]);

// Create App
$app = AppFactory::create();

// Create Twig
$twig = Twig::create(__DIR__ . '/../adapter/pages/', ['cache' => false]);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

// Define Custom Error Handler
$customErrorHandler = function (ServerRequestInterface $request) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $view = Twig::fromRequest($request);

    return $view->render($response, '404.twig', [
        'title' => 'Página não encontrada no servidor!',
    ]);
};

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Error Handler
$errorMiddleware->setErrorHandler(
    HttpNotFoundException::class,
    $customErrorHandler
);

// Route for Page Not Found
function (ServerRequestInterface $request) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $view = Twig::fromRequest($request);
    return $view->render($response, '404.twig', [
        'title' => 'Página não encontrada no servidor!',
    ]);
};

// Session Authentication AFTER
$authentication = function ($request, $handler) {
    $response = $handler->handle($request);

    if(! isset($_SESSION['user_logged'])) {
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('login'); 

        return $response
            ->withHeader('Location', $url)
            ->withStatus(302);
    }
    
    return $response;
};

// Session Authentication ADM AFTER
$authAdmin = function ($request, $handler) {
    $response = $handler->handle($request);

    if(! isset($_SESSION['user_admin_logged'])) {
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $url = $routeParser->urlFor('login-admin'); 

        return $response
            ->withHeader('Location', $url)
            ->withStatus(302);
    }
    
    return $response;
};

// Página Inicial da Aplicação
$app->get('/', HomeController::class)->setName('home');

// Listar items do carrinho
$app->map(['GET', 'POST'], '/carrinho', CartController::class)->setName('carrinho')->add($authentication);

// Adiciona um novo item no carrinho
$app->map(['GET', 'POST'], '/adicionar/{id}', AddItemToCartController::class)->add($authentication);

// Remove item do carrinho
$app->map(['GET', 'POST'], '/remover/{id}', RemoveFromCartController::class)->add($authentication);

// Página de Pagamento
$app->map(['GET', 'POST'], '/pagamento', PaymentController::class)->setName('pagamento')->add($authentication);

// Página de pedido do usuário
$app->map(['GET', 'POST'], '/pedido', DemandController::class)->add($authentication)->setName('pedido');

// Página de Contato Conosco
$app->map(['GET', 'POST'], '/contato', ContactController::class)->setName('contato');

// Deslogar do sistema
$app->get('/logout', function($request, $response) {
    unset($_SESSION['user_logged']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_admin_logged']);
    unset($_SESSION['user_admin_email']);

    $routeParser = RouteContext::fromRequest($request)->getRouteParser();
    $url = $routeParser->urlFor('home'); 

    return $response
        ->withHeader('Location', $url)
        ->withStatus(302);
});

// Página de Cadastro
$app->map(['GET', 'POST'], '/cadastro', RegisterController::class)->setName('cadastro');

// Página de Login
$app->map(['GET', 'POST'], '/login', SignInController::class)->setName('login');

// Esqueci senha
$app->map(['GET', 'POST'], '/esqueci-senha', ForgotPasswordController::class)->setName('esqueci-senha');

// Altera senha do usuário para recuperar
$app->map(['GET', 'POST'], '/alteracao-de-senha', AlterPasswordController::class)->setName('alteracao-de-senha');

// Login administrativo
$app->map(['GET', 'POST'], '/login-admin', LoginAdmController::class)->setName('login-admin');

// Administração do site
$app->group('/admin', function (RouteCollectorProxy $group) use ($authAdmin) {
    $group->map(['GET', 'POST'], '/novo-produto', AdminRegisterProductController::class)->setName('cadastrar-produto')->add($authAdmin);
});

// Run app
$app->run();
