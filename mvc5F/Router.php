<?php

class Router
{
    private array $routes = [];

    public function match($url, $method): array
    {
        $values = [];
        if(array_key_exists($url, $this->routes[$method])){
            $values['controller'] = $this->routes[$method][$url]['controller'];
            $values['action'] = $this->routes[$method][$url]['action'];
        }

        return $values;
    }

    public function addController($method, $url, $controller, $action) : void
    {
        $this->routes[$method][$url] = [
            'controller' => $controller,
            'action' => $action
        ];


    }
}