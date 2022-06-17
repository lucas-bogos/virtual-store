<?php

declare(strict_types=1);

namespace source\application\repositories\contracts;

interface RemoveFromCartInterface
{
    public function remove(): void;
}
