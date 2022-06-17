<?php

declare(strict_types=1);

namespace source\shared\utils;

class FilterInput {
    public static function clean(
        string $name = '',
        int $filter = FILTER_DEFAULT,
        int $requestType = INPUT_POST
    ): string|null
    {
        return filter_input($requestType, $name) == null 
            ? null 
            : htmlspecialchars(filter_input($requestType, $name, $filter));
    }
}
