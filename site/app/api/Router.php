<?php


namespace app\api;

use app\libraries\Core;

class Router {

    /** @var Core  */
    protected $core;

    /** @var array  */
    protected $api_map = [
        'token' => 'TokenApi'
    ];

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function run() {
        $router = $this->core->getApiRouter();

        $router->with('/api', function () use ($router) {
            foreach ($this->api_map as $namespace => $api_name) {
                $api_name = 'app\\api\\' . $api_name;
                $api = new $api_name($this->core);
                foreach ($api->routes as $route) {
                    $router->respond($route[0], $route[1], [$api, $route[2]]);
                }
            }
        });

        $router->dispatch();
    }
}