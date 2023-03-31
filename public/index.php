<?php
require_once __DIR__ . "/../vendor/autoload.php";

$router = new App\Router();

$router
    ->register("/", [\App\Controller\Home::class, 'index'])
    ->register("/invoices", [\App\Controller\Invoice::class, 'index'])
    ->register("/invoices/create", [\App\Controller\Invoice::class, 'create']);

echo $router->resolve($_SERVER["REQUEST_URI"]);