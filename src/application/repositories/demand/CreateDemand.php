<?php

declare(strict_types=1);

namespace source\application\repositories\demand;

use Exception;
use PDO;
use source\application\repositories\contracts\CreateDemandInterface;
use source\shared\infra\ConnectionPDO;

class CreateDemand implements CreateDemandInterface {
    public static function save($idPrePurchase, $paymentMethod): bool|array|null
    {
        $query = 'INSERT INTO demand(id_pre_purchase, payment_method) VALUES(?, ?)';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                0 => $idPrePurchase,
                1 => $paymentMethod
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(Exception $error) {
            echo 'Não foi possível criar pedido. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
