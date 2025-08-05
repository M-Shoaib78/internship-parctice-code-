<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die;
}
function uriIs($val)
{
    return $_SERVER['REQUEST_URI'] === "$val";
}

function abort($code = 404)
{
    http_response_code($code);
    // echo 'Sorry. Invalid Route';
    require view("/{$code}.php");
}
function authorized($condition, $status = Response::FORBIDDEN)
{
    if ($condition) {
        abort($status);
    }
}
function base_path($path)
{
    return BASE_PATH . $path;
}
function view($path, $attibutes = [])
{
    extract($attibutes);
    require base_path('views/' . $path);
}
