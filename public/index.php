<?php

use App\Config;

require_once __DIR__ . "/../vendor/autoload.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define("STORAGE_PATH", __DIR__ . "/../storage");
define("VIEW_PATH", __DIR__ . "/../views");

$router = new App\Router();

$router
    ->get("/", [\App\Controllers\Home::class, 'index'])
    ->get("/register", [\App\Controllers\Account::class, 'register']);

(new \App\App($router,
    [
        "uri" => $_SERVER["REQUEST_URI"],
        "method" => $_SERVER["REQUEST_METHOD"]
    ],
    new Config($_ENV)
))->run();