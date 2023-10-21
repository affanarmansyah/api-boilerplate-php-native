<?php

namespace src\controllers\v1; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;

class UsersController extends DefaultController
{
    public function list()
    {
        return ["message" => "list success"];
    }

    public function detail()
    {
        return ["message" => "detail"];
    }

    public function edit()
    {
        return ["message" => "edit"];
    }
}
