<?php

declare(strict_types=1);

namespace source\application\repositories\cart;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class RemoveFromCart
{
    public static function unique($id_product)
    {
        $sql = 'DELETE FROM cart WHERE id_product=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => $id_product]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $error) {
            echo 'Não foi possível remover do carrinho o produto. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }
}
