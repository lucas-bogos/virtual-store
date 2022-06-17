<?php

declare(strict_types=1);

namespace source\application\repositories\contracts;

interface SignInInterface
{
    public function sign(
        string $email, 
        string $password
    ): bool|array;
}
