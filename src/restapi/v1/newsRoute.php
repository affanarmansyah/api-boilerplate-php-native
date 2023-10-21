<?php

namespace src\restapi\v1;

use src\controllers\v1\NewsController;
use src\utilities\RouteUtilities;

class NewsRoute
{
    public function router(RouteUtilities $route, NewsController $controller)
    {
        return [
            $route->GET('/news/list', [$controller, 'list']),
            $route->POST('/news/create', [$controller, 'create'])
        ];
    }
}
