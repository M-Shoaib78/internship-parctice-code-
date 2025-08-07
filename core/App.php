<?php

namespace Core;

class App
{
    protected static $container;
    static function setContainer($container)
    {
        static::$container = $container;
    }
    static function container()
    {
        return static::$container;
    }
    static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }
    static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}
