<?php

declare(strict_types=1);

namespace source\application\repositories\cart;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class GetItemsFromCart
{
    public static function allFromUser(?string $user_email)
    {
        $sql =
            'SELECT * FROM cart JOIN user JOIN product WHERE user.id_user=cart.id_user AND product.id_product=cart.id_product AND user.user_email=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => $user_email]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca pelos produtos. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }
}
