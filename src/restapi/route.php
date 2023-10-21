<?php


namespace src\restapi;

use src\controllers\v1\NewsController;
use src\restapi\v1\news\NewsRoute;

class Route
{
    public function route(NewsController $newsController)
    {
        $this->newsRouteV1($newsController);
    }

    private function newsRouteV1(NewsController $controller)
    {
        $newsRoute = new NewsRoute;
        $newsRoute->setPrefix("api");
        $newsRoute->setVersion("v1");
        $newsRoute->router($controller);
    }
}
