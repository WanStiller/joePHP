<?php

namespace App\Core;

class App {
    public static Router $router;

    public static function init() {
        self::$router = new Router();
    }
}
