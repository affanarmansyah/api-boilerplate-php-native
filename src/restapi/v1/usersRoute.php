<?php

namespace src\restapi\v1;

use src\controllers\v1\UsersController;
use src\utilities\RouteUtilities;

class UsersRoute
{
    public function router(RouteUtilities $route, UsersController $controller)
    {
        return [
            $route->GET('/users/list', [$controller, 'list']),
            $route->GET('/users/detail', [$controller, 'detail'])
        ];
    }
}
