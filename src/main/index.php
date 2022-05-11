<?php

require_once __DIR__ . "/../../vendor/autoload.php";

// faz o get na url atual no browser
$url = $_SERVER["REQUEST_URI"];
$url = array_filter(explode("/", $url));

if($url[1] == "filtro") {
  echo $url[1];
} else {
  $lastItemFromUrl = isset($url[array_key_last($url)]) ? $url[array_key_last($url)] : "home";

  if (is_file(__DIR__ . "/../adapter/views/$lastItemFromUrl.php")) {
    include __DIR__ . "/../adapter/views/$lastItemFromUrl.php";
  } else {
    include __DIR__ . "/../adapter/views/404.php";
  }
}
