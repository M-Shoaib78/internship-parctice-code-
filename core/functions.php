<?php

use Core\Response;
use Core\Session;

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
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}


function partials($path, $attibutes = [])
{
    extract($attibutes);
    require base_path('views/partials' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
function logout()
{
    Session::destroy();
}
function old($key, $default = "")
{
    return Core\Session::get('old')[$key] ?? $default;
}
