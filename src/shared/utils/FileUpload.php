<?php

declare(strict_types=1);

namespace source\shared\utils;

class FileUpload
{
    public static function save()
    {
        // diretório para onde será armazenado
        $dir = 'uploads/';

        // recebendo o arquivo multipart
        $file = $_FILES['picture'];

        // Move o arquivo da pasta temporaria de upload para a pasta de destino
        move_uploaded_file($file['tmp_name'], "$dir/" . $file['name']);

        // string que irá para o banco de dados
        $str = $dir . $file['name'];

        return $str;
    }
}
