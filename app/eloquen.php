<?php

require_once __DIR__. "/../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([
    'host' => $_ENV["DB_HOST"],
    'driver' => $_ENV["DB_DRIVER"] ?? "mysql",
    'database' => $_ENV["DB_DATABASE"],
    'username' => $_ENV["DB_USER"],
    'password' => $_ENV["DB_PASS"],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
