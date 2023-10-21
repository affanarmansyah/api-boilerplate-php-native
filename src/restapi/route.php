<?php

namespace src\restapi;

use src\controllers\v1\NewsController;
use src\controllers\v1\UsersController;
use src\restapi\v1\NewsRoute;
use src\restapi\v1\UsersRoute;
use src\utilities\RouteUtilities;

class Route extends RouteUtilities
{
    public function route(NewsController $newsController, UsersController $usersController)
    {
        $this->setRoutes([
            $this->newsRouteV1($newsController),
            $this->usersRouteV1($usersController),
        ]);
    }

    private function newsRouteV1(NewsController $controller)
    {
        $this->setPrefix("api");
        $this->setVersion("v1");

        $newsRoute = new NewsRoute;
        return $newsRoute->router($this, $controller);
    }

    private function usersRouteV1(UsersController $controller)
    {
        $this->setPrefix("api");
        $this->setVersion("v1");
        
        $usersRoute = new UsersRoute;
        return $usersRoute->router($this, $controller);
    }
}
