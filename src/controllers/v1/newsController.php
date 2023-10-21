<?php

namespace src\controllers\v1;

use src\controllers\component\DefaultController;

class NewsController extends DefaultController
{
    public function list()
    {
        http_response_code(200);

        echo json_encode(["message" => "list succsess"]);
    }

    public function detail()
    {
        http_response_code(200);

        echo json_encode(["message" => "detail succsess"]);
    }
}
