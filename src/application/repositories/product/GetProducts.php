<?php

declare(strict_types=1);

namespace source\application\repositories\product;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class GetProducts
{
    public static function all()
    {
        $sql = 'SELECT * FROM product';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca pelos produtos. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function find($string)
    {
        $sql = 'SELECT * FROM product WHERE title LIKE ?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => "%$string%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca pelos produtos. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function filterByPrice($price) {
        $from = 0;
        $until = 1000;

        switch($price) {
            case '0-100':
                $from = 0;
                $until = 100;
                break;
            case '100-200':
                $from = 100;
                $until = 200;
                break;
            case '200-300':
                $from = 200;
                $until = 300;
                break;
        }

        $sql = 'SELECT * FROM product WHERE price >= ? AND price <= ?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                0 => $from,
                1 => $until
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $error) {
            echo 'Não foi possível realizar o filtro dos produtos. Mensagem: ' .
            $error->getMessage();
            return false;
        }
    }
}
