<?php

declare(strict_types=1);

namespace source\application\repositories\user;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class GetUser
{
    public static function all()
    {
        $sql = 'SELECT * FROM user';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca por usuários. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function byEmail($email)
    {
        $sql = 'SELECT * FROM user WHERE user_email=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => $email]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca por usuários. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }

    public static function deliveryData($email)
    {
        $sql =
            'SELECT user_email,phone_number,street,street_number,district,state,city,zip_code FROM user WHERE user_email=?';

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([0 => $email]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo 'Não foi possível realizar a procura pelo endereço do usuário. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }
}
