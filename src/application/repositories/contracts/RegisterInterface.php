<?php

declare(strict_types=1);

namespace source\application\repositories\contracts;

interface RegisterInterface
{
    public function registerUser(
        string $name, 
        string $email, 
        string $password,
        string $phoneNumber,
        string $birth,
        null|string $photo,
        null|string $rg,
        null|string $cpf,
        null|string $street,
        null|int $streetNumber,
        null|string $district,
        null|string $state,
        null|string $city,
        null|string $zipCode
    ): bool;

    public function userExists(string $email): bool;
}
