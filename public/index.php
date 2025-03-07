<?php

require_once '../app/Core/App.php';
require_once '../app/Core/Router.php';

use App\Core\App;
use App\Core\Router;

App::init();

$router = App::$router;

// Definir rutas de prueba
$router->get("/", function () {
    return "¡Bienvenido a JoePHP!";
});

$router->get("/hola", function () {
    return "Hola desde JoePHP 🚀";
});

$router->resolve();
