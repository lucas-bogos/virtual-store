<?php

declare(strict_types=1);

namespace source\application\repositories\cart;

use Exception;
use source\shared\infra\ConnectionPDO;

class AddToCart 
{
    public static function create(int|string $idUser, int|string $idProduct) 
    {
        $sql = 'INSERT INTO cart(id_product, id_user) VALUES(?, ?)';
        $data = [0 => $idProduct, 1 => $idUser];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            return true;

        } catch(Exception $error) {
            echo 'Não foi possível adicionar ao carrinho. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
