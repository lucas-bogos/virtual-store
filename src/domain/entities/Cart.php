<?php

declare(strict_types=1);

namespace source\domain\entities;

class Cart 
{
  static array $products = [];

  public function addToShoppingCart(Product $product): array
  {
    $updatedCollection = array_push(self::$products, $product);
    return [$updatedCollection];
  }
}
