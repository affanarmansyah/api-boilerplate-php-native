<?php

namespace src\restapi;

use src\controllers\v1\NewsController;
use src\controllers\v1\UsersController;

class Rest
{
    public function makeRoute()
    {
        $routes = new Route;
        $routes->route(new NewsController, new UsersController);
    }
}
