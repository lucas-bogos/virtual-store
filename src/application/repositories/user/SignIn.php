<?php

declare(strict_types=1);

namespace source\application\repositories\user;

use Exception;
use PDO;
use source\application\repositories\contracts\SignInInterface;
use source\domain\entities\User;
use source\domain\valueObjects\Email;
use source\shared\infra\ConnectionPDO;

class SignIn implements SignInInterface {
    public function sign(string $email, string $password): array|bool
    {
        $user = new User();

        $user->setEmail(new Email($email));

        $query = 'SELECT user_email, user_name, password FROM user WHERE user_email = ?';

        $data = [0 => $user->getEmail()];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return empty($user) ? false: $user;

        } catch(Exception $error) {
            echo 'Não foi possível fazer login. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
