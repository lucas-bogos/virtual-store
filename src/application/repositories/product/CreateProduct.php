<?php

declare(strict_types=1);

namespace source\application\repositories\product;

use Exception;
use PDO;
use source\application\repositories\contracts\CreateProductInterface;
use source\domain\entities\Product;
use source\shared\infra\ConnectionPDO;

class CreateProduct implements CreateProductInterface
{
    public static function build(Product $product): array|null|bool
    {
        $sql = 'INSERT INTO product(title, description, photo, quantity, price, assurance, brand, code, color, size) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $data = [
            0 => $product->getTitle(),
            1 => $product->getDescription(),
            2 => $product->getPhoto(),
            3 => $product->getQuantity(),
            4 => $product->getPrice(),
            5 => $product->getAssurance(),
            6 => $product->getBrand(),
            7 => $product->getBarCode(),
            8 => $product->getColor(),
            9 => $product->getSize()            
        ];
    
        try {
            $pdo = ConnectionPDO::init();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            return true;

        } catch (Exception $error) {
            echo 'Não foi possível realizar a busca pelos produtos. Mensagem: ' .
                $error->getMessage();
            return false;
        }
    }
}
