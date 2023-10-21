<?php

namespace src\controllers\component;

class DefaultController
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }
}
