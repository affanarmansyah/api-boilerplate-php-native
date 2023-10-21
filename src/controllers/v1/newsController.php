<?php

namespace src\controllers\v1; // Ubah namespace menjadi src\controllers

use src\controllers\component\DefaultController;
use src\models\NewsModel;

class NewsController extends DefaultController
{
    public function list()
    {
        $model = new NewsModel();

        // secara default ketika tidak ada filter 
        $newsData = $model->list(1, "", 10);

        // ketika ada filter yang di request
        if (!empty($_GET)) {
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

            $newsData = $model->list($page, $keyword, $limit);
        }

        return $newsData;
    }

    public function detail()
    {
        return ["message" => "detail"];
    }

    public function create()
    {
        return ["message" => $_POST];
    }

    public function edit()
    {
        return ["message" => "edit"];
    }
}
