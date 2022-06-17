<?php

declare(strict_types=1);

namespace source\shared\utils;

class JoinField {
    
    public static function create(array $fields): mixed
    {
        $fieldJoined = '';

        foreach($fields as $field) {
            $fieldJoined .= $field;
        }

        return $fieldJoined;
    }

    public static function date(
        null|int|string $day,
        null|int|string $month, 
        null|int|string $year
    ): mixed
    {
        return "$year-$month-$day";
    }
}
