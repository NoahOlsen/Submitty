<?php


namespace app\api;

class TokenApi extends AbstractApi {

    /** @var array  */
    public $routes = [
        ['GET', '/token', 'getToken']
    ];

    public function getToken($request, $response) {
        return $response->json($this->core->getOutput()->renderJsonSuccess("test"));
    }
}