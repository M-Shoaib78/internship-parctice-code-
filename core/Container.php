<?php

namespace Core;

class Container
{
    protected $bindings = [];
    function bind($key, $reolver)
    {
        $this->bindings[$key] = $reolver;
    }
    function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("no matching bindin found for " . $key);
        }
        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
