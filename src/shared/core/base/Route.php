<?php

declare(strict_types=1);

namespace source\shared\core\base;

class Route {
  public static function page(string $slug, string $controller, ?array $options = null): void
  {
    $url = $_SERVER["REQUEST_URI"];
    $allItemsFromUrl = array_filter(explode("/", $url));
    $lastItemFromUrl = $url[array_key_last($url)];
    echo is_file($lastItemFromUrl.".php");
  }
}