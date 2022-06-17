<?php

declare(strict_types=1);

namespace source\application\repositories\user;

use Exception;
use PDO;
use source\domain\entities\User;
use source\domain\valueObjects\Email;
use source\shared\infra\ConnectionPDO;

class UpdateAddress 
{
    public static function justOne(
        ?string $email, 
        ?string $phoneNumber,
        null|string $rg = null,
        null|string $cpf = null,
        null|string $street = null,
        null|int $streetNumber = null,
        null|string $district = null,
        null|string $state = null,
        null|string $city = null,
        null|string $zipCode = null,
        int $idUser
    ): bool
    {
        $user = new User();

        $email = new Email($email);

        $user
            ->setEmail($email)
            ->setPhoneNumber($phoneNumber)
            ->setRg($rg)
            ->setCpf($cpf)
            ->setStreet($street)
            ->setStreetNumber($streetNumber)
            ->setDistrict($district)
            ->setState($state)
            ->setCity($city)
            ->setZipCode($zipCode)
        ;

        $query = "UPDATE user SET
            user_email=?,
            phone_number=?,
            rg=?,
            cpf=?,
            street=?,
            street_number=?,
            district=?,
            state=?,
            city=?,
            zip_code=?
            WHERE id_user=?";

        $data = [
            0 => $user->getEmail(),
            1 => $user->getPhoneNumber(),
            2 => $user->getRg(),
            3 => $user->getCpf(),
            4 => $user->getStreet(),
            5 => $user->getStreetNumber(),
            6 => $user->getDistrict(),
            7 => $user->getState(),
            8 => $user->getCity(),
            9 => $user->getZipCode(),
            10 => $idUser
        ];

        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($query);
            $stmt->execute($data);
            return true;

        } catch(Exception $error) {
            echo 'Não foi possível atualizar. Mensagem: ' . $error->getMessage();
            return false;
        }
    }
}
