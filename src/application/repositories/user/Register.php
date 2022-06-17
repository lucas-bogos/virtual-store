<?php

declare(strict_types=1);

namespace source\application\repositories\user;

use Exception;
use PDO;
use source\application\repositories\contracts\RegisterInterface;
use source\domain\entities\User;
use source\domain\valueObjects\BirthDate;
use source\domain\valueObjects\Email;
use source\domain\valueObjects\Name;
use source\domain\valueObjects\Password;
use source\shared\infra\ConnectionPDO;

class Register implements RegisterInterface 
{
    public function registerUser(
        ?string $name, 
        ?string $email, 
        ?string $password,
        ?string $phoneNumber,
        ?string $birth,
        null|string $photo = null,
        null|string $rg = null,
        null|string $cpf = null,
        null|string $street = null,
        null|int $streetNumber = null,
        null|string $district = null,
        null|string $state = null,
        null|string $city = null,
        null|string $zipCode = null
    ): bool
    {
        $user = new User();

        $name = new Name($name);
        $email = new Email($email);
        $password = new Password($password);

        $user
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password)
            ->setPhoneNumber($phoneNumber)
            ->setBirth($birth)
            ->setPhoto($photo)
            ->setRg($rg)
            ->setCpf($cpf)
            ->setStreet($street)
            ->setStreetNumber($streetNumber)
            ->setDistrict($district)
            ->setState($state)
            ->setCity($city)
            ->setZipCode($zipCode)
        ;

        $query = "INSERT INTO user(
            user_name,
            user_email,
            password,
            phone_number,
            user_birth,
            user_photo,
            rg,
            cpf,
            street,
            street_number,
            district,
            state,
            city,
            zip_code
        ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $data = [
            0 => $user->getName(),
            1 => $user->getEmail(),
            2 => $user->getPassword(),
            3 => $user->getPhoneNumber(),
            4 => $user->getBirth(),
            5 => $user->getPhoto(),
            6 => $user->getRg(),
            7 => $user->getCpf(),
            8 => $user->getStreet(),
            9 => $user->getStreetNumber(),
            10 => $user->getDistrict(),
            11 => $user->getState(),
            12 => $user->getCity(),
            13 => $user->getZipCode(),
        ];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch(Exception $error) {
            echo 'Não foi possível realizar o cadastro. Mensagem: ' . $error->getMessage();
            return false;
        }
    }

    public function userExists(string $email): bool
    {
        $user = new User();
        $user->setEmail(new Email($email));
        $query = "SELECT (user_email) FROM user WHERE user_email = ?";
        $data = [0 => $user->getEmail()];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            $users = $stmt->fetchAll();
            
            return !count($users) < 1 ? true : false;

        } catch(Exception $error) {
            echo 'Não foi possível executar a ação. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
