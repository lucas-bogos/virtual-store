<?php

declare(strict_types=1);

namespace source\application\repositories\contracts;

interface CreateDemandInterface
{
    public static function save($idPrePurchase, $paymentMethod): bool|array|null;
}
