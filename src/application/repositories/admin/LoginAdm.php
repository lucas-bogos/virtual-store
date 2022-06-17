<?php

declare(strict_types=1);

namespace source\application\repositories\admin;

use Exception;
use PDO;
use source\shared\infra\ConnectionPDO;

class LoginAdm {
    public static function check(string $email, string $password): array|bool
    {
        $query = 'SELECT name, email, password FROM user_admin WHERE email = ? AND password = ?';

        $data = [
            0 => $email,
            1 => $password
        ];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            $adm = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return empty($adm) ? false : $adm;

        } catch(Exception $error) {
            echo 'Não foi possível fazer login. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
