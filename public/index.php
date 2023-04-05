<?php

use App\Router;
use App\App;
use App\Config;
use App\Container;
use App\Controllers\AccountController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;

require_once __DIR__ . "/../vendor/autoload.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define("STORAGE_PATH", __DIR__ . "/../storage");
define("VIEW_PATH", __DIR__ . "/../views");

$container = new Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes([
    HomeController::class,
    InvoiceController::class,
    AccountController::class
]);

// echo '<pre>';
// print_r($router->routes());
// echo '</pre>';

// $router
//     ->get("/", [\App\Controllers\Home::class, 'index'])
//     ->get("/register", [\App\Controllers\Account::class, 'register']);

(new App(
    $container,
    $router,
    [
        "uri" => $_SERVER["REQUEST_URI"],
        "method" => $_SERVER["REQUEST_METHOD"]
    ],
    new Config($_ENV)
))->run();
