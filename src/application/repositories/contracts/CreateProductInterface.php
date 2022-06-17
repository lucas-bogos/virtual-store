<?php

declare(strict_types=1);

namespace source\application\repositories\contracts;

use source\domain\entities\Product;

interface CreateProductInterface
{
    public static function build(Product $product): null|bool|array;
}
