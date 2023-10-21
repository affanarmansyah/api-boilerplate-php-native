<?php


namespace src\restapi\v1\news;

use src\controllers\v1\NewsController;
use src\utilities\Route;

class NewsRoute extends Route
{
    public function router(NewsController $controller)
    {
        $this->GET('/news/list', [$controller, 'list']);
        $this->GET('/news/detail', [$controller, 'detail']);
    }
}
