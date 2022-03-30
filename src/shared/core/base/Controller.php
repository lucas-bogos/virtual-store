<?php

declare(strict_types=1);

namespace source\shared\core\base;

use UnexpectedValueException;

class Controller 
{
  private string $method;
  
  public function handle(): array
  {
    $method = $_SERVER["REQUEST_METHOD"];
    $request = [];

    if(! isset($method)) {
      throw new UnexpectedValueException("Method request can't be empty");
    }
    if($method == "GET") {
      $request.array_push($_GET);
    }
    if($method == "POST") {
      $request.array_push($_POST);
    }
    return $request;
  }
}