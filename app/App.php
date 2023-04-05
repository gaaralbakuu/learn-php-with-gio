<?php

namespace App;

use App\Models\SignUp;
use App\Models\SignUpInterface;

class App
{
    private static DB $db;

    public function __construct(protected Container $container,protected Router $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($this->config->db ?? []);

        $container->set(SignUpInterface::class, SignUp::class);
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