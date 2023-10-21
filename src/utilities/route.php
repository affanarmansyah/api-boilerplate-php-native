<?php

namespace src\utilities;

class Route
{
    private string $version; // v1, v2 d11
    private string $prefix; // api

    public function _construct()
    {
        header('Content-Type: application/json');
    }

    private function run(string $path, $controller, string $action, string $method)
    {
        $requestUrls = explode('/', $_SERVER['REQUEST_URI']);
        $actionExplode = explode('?', $requestUrls[5]);
        $path = "/" . $this->prefix . "/" . $this->version . $path;

        if ($requestUrls[4] === "") {
            http_response_code(404);

            echo json_encode(["message" => "Api not found"]);
        }

        $urlPath = "/" . $requestUrls[2] . "/" . $requestUrls[3] . "/" . $requestUrls[4] . "/" . $actionExplode[0]; // api/v1/<nama-controller>/<nama-action>
        if ($urlPath === $path) {
            if ($this->checkMethod($method)) {
                echo $controller->$action();
            } else {
                http_response_code(404);

                echo json_encode(["message" => "Api not found"]);
            }
        } else {
            http_response_code(404);

            echo json_encode(["message" => "Api not found"]);
        }
    }

    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    private function checkMethod(string $method)
    {
        return $_SERVER['REQUEST_METHOD'] === $method;
    }

    protected function GET(string $path, array $controller)
    {
        $this->run($path, $controller[0], $controller[1], "GET");
    }

    protected function POST(string $path, array $controller)
    {
        $this->run($path, $controller[0], $controller[1], "POST");
    }
}
