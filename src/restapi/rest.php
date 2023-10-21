<?php


namespace src\restapi;

use src\controllers\v1\NewsController;

class Rest
{
    public function makeRoute()
    {
        $routes = new Route;
        $routes->route(new NewsController);
    }
}
