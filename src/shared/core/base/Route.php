<?php

declare(strict_types=1);

namespace source\shared\core\base;

class Route {
  public static function page(string $url, string $controller, ?array $options = null): void
  {
    switch(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)) {
      case $url:
        if(! $options == null) {
          foreach($options as $func) {
            $options[$func];
          }
        }
        include_once __DIR__."/../../../adapter/controllers/".$controller;
        break;
    }
  }

  public static function config(string $url, array $routes): void
  {
    if(! in_array($url, $routes)) echo "Página não encontrada!";
  }
}