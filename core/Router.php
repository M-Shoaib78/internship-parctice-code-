<?php

class Router
{
    protected $routes = [];
    function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];
    }
    function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
        ];
    }
    function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE',
        ];
    }
    function put($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT',
        ];
    }
    function patch($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH',
        ];
    }
}

// code updated in new better version
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
