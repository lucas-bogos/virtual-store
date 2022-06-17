<?php

declare(strict_types=1);

namespace source\application\repositories\demand;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class DataForPurchase
{
    public static function save($idUser, $couponCode, $total)
    {
        $query =
            'INSERT INTO pre_purchase(id_user, coupon_code, total) VALUES(?, ?, ?)';

        $data = [
            0 => $idUser,
            1 => $couponCode,
            2 => $total,
        ];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível salvar os dados para compra. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function exists($idUser)
    {
        $sql = 'SELECT id_user from pre_purchase WHERE id_user=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => $idUser]);
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return empty($response) ? false : true;
        } catch (Exception $error) {
            echo 'Não foi possível salvar os dados para compra. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function update($idUser, $couponCode, $total)
    {
        $query =
            'UPDATE pre_purchase SET coupon_code=?, total=? WHERE id_user=?';

        $data = [
            0 => $couponCode,
            1 => $total,
            2 => $idUser,
        ];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível atualizar os dados para compra. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function get($idUser)
    {
        $query = 'SELECT * FROM pre_purchase WHERE id_user=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute([0 => $idUser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível buscar os dados para compra. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }
}
