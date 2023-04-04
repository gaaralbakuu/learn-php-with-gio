<?php

namespace App;

class App
{
    private static DB $db;

    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($this->config->db ?? []);
    }

    public static function db(): DB{
        return static::$db;
    }

    public function run(){
        try{
            echo $this->router->resolve($this->request["uri"], strtolower($this->request["method"]));

        } catch (\App\Exceptions\RouteNotFoundException $e) {
            http_response_code(404);
            echo \App\Controllers\View::make("error/404");
        }
    }
}