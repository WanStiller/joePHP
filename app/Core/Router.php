<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $path, callable|array $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, callable|array $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            http_response_code(404);
            echo "Página no encontrada";
            return;
        }

        if (is_callable($callback)) {
            echo call_user_func($callback);
        } elseif (is_array($callback)) {
            [$controller, $method] = $callback;
            $controllerInstance = new $controller();
            echo call_user_func([$controllerInstance, $method]);
        }
    }
}
