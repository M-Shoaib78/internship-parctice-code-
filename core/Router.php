<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Router
{
    protected $routes = [];
    function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => NULL
        ];
        return $this;
    }
    function get($uri, $controller)
    {

        return $this->add("GET", $uri, $controller);
    }
    function post($uri, $controller)
    {
        return $this->add("POST", $uri, $controller);
    }
    function delete($uri, $controller)
    {
        return $this->add("DELETE", $uri, $controller);
    }
    function put($uri, $controller)
    {
        return $this->add("PUT", $uri, $controller);
    }
    function patch($uri, $controller)
    {
        return $this->add("PATCH", $uri, $controller);
    }
    function only($key)
    {

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
    function route($uri, $method)
    {
        // dd($uri);
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware'] === 'guest') {
                    (new Guest)->handle();
                }
                if ($route['middleware'] === 'auth') {
                    (new Auth)->handle();
                }
                return require base_path($route['controller']);
            }
        }
        abort();
    }
}

// // code updated in new better version
// $routes = require(base_path('/routes.php'));
// // if ($uri === "/") {
// //     require "controllers/index.php";
// // } else if ($uri === "/about") {
// //     require "controllers/about.php";
// // } else if ($uri === "/contact") {
// //     require "controllers/contact.php";
// // }


// $uri = parse_url($_SERVER["REQUEST_URI"])['path'];

// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }
// routeToController($uri, $routes);
