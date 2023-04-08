<?php

namespace App;

use App\Models\SignUp;
use App\Models\SignUpInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class App
{
    private Config $config;

    public function __construct(
        protected Container $container,
        protected ?Router $router,
        protected array $request
    ) {
    }

    public function initDB(array $config)
    {
        $capsule = new Capsule;

        $capsule->addConnection($config);

        $capsule->setEventDispatcher(new Dispatcher());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function boot(): static
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);

        $this->initDB($this->config->db);

        $this->container->bind(SignUpInterface::class, SignUp::class);

        return $this;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request["uri"], strtolower($this->request["method"]));
        } catch (\App\Exceptions\RouteNotFoundException $e) {
            http_response_code(404);
            echo \App\Controllers\View::make("error/404");
        }
    }
}
