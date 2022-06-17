<?php

declare(strict_types=1);

namespace source\application\repositories\user;

use Exception;
use PDO;
use source\domain\entities\User;
use source\domain\valueObjects\Password;
use source\shared\infra\ConnectionPDO;

class UpdatePassword {
    public static function one(string $idUser, string $password): array|bool
    {
        $user = new User();
        $password = new Password($password);

        $user->setPassword($password);
        
        $query = 'UPDATE FROM user SET password=? WHERE id_user=?';

        $data = [0 => $user->getPassword(), 1 => $idUser];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return empty($user) ? false: $user;

        } catch(Exception $error) {
            echo 'Não foi possível atualizar senha. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
