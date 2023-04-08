<?php

use App\Router;
use App\App;
use App\Config;
use App\Controllers\AccountController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use Illuminate\Container\Container;

require_once __DIR__ . "/../vendor/autoload.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define("STORAGE_PATH", __DIR__ . "/../storage");
define("VIEW_PATH", __DIR__ . "/../views");

$container = new Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes([
    HomeController::class,
    InvoiceController::class,
    AccountController::class
]);

(new App(
    $container,
    $router,
    [
        "uri" => $_SERVER["REQUEST_URI"],
        "method" => $_SERVER["REQUEST_METHOD"]
    ],
    new Config($_ENV)
))->boot()->run();
