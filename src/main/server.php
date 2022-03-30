<?php

use source\shared\core\base\Route;

// faz o get na url atual no browser
$url = $_SERVER["REQUEST_URI"];

// configura o roteamento e o slug
Route::config($url, $routes = [
  "home" => "/",
  "login" => "/sign-in"
]);

// seta o controlador vinculado a uma rota
Route::page($routes["home"], "indexController.php");
Route::page($routes["login"], "signInController.php");