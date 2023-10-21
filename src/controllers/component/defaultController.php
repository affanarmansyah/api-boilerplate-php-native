<?php

namespace src\controllers\component; // Ubah namespace menjadi src\controllers


class DefaultController
{
    public function __construct()
    {
        header('Content-Type: application/json');

        http_response_code(200);
    }

    public function error(int $errorCode)
    {
        http_response_code($errorCode);
    }

    public function getRawBody()
    {
        $rawdata = file_get_contents("php://input");
        return json_decode($rawdata);
    }
}
