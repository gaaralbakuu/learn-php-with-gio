<?php

use App\Config;
use App\Container;

require_once __DIR__ . "/../vendor/autoload.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define("STORAGE_PATH", __DIR__ . "/../storage");
define("VIEW_PATH", __DIR__ . "/../views");

$container = new Container();
$router = new App\Router($container);

$router
    ->get("/", [\App\Controllers\Home::class, 'index'])
    ->get("/register", [\App\Controllers\Account::class, 'register']);

(new \App\App(
    $container,
    $router,
    [
        "uri" => $_SERVER["REQUEST_URI"],
        "method" => $_SERVER["REQUEST_METHOD"]
    ],
    new Config($_ENV)
))->run();
