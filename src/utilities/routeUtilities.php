<?php

namespace src\utilities;

class RouteUtilities
{
    private string $version; // v1, v2 dll
    private string $prefix; // api
    public array $routeMethod; // api

    private function run(string $path, $controller, string $action, string $method)
    {
        $requestUrls = explode('/', $_SERVER['REQUEST_URI']);
        $actionExplode = explode('?', $requestUrls[5]);
        $path = "/" . $this->prefix . "/" . $this->version . $path;

        if ($requestUrls[4] === '') {
            return [
                'success' => false,
                'code' => 404,
                'data' => ["message" => "Api not found"]
            ];
        }

        $urlPath = "/" . $requestUrls[2] . "/" . $requestUrls[3] . "/" . $requestUrls[4] . "/" . $actionExplode[0]; // api/v1/<nama-controller>/<nama-action>

        if ($urlPath === $path) {
            if ($this->checkMethod($method)) {
                return [
                    'success' => true,
                    'code' => null,
                    'data' => $controller->$action(),
                ];
            } else {
                return [
                    'success' => false,
                    'code' => 404,
                    'data' => ["message" => "Api not found"]
                ];
            }
        } else {
            return [
                'success' => false,
                'code' => 404,
                'data' => ["message" => "Api not found"]
            ];
        }
    }

    protected function setRoutes(array $routes)
    {
        // gabungkan semua array api 
        $mergedRoutes = [];
        foreach ($routes as $data) {
            foreach ($data as $item) {
                $mergedRoutes[] = $item;
            }
        }

        // tampilkan response ketika ada API yang active
        $activeApi = false;
        foreach ($mergedRoutes as $route) {
            if ($route['success'] === true) {
                $activeApi = true;
                echo json_encode($route['data']);
            }
        }

        // jika tidak ada API yang ditemukan, maka response error
        if (!$activeApi) {
            http_response_code($route['code']);
            echo json_encode($route['data']);
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

    public function GET(string $path, array $controller)
    {
        return $this->run($path, $controller[0], $controller[1], "GET");
    }

    public function POST(string $path, array $controller)
    {
        return $this->run($path, $controller[0], $controller[1], "POST");
    }
}
