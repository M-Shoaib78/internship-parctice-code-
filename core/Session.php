<?php

namespace Core;

class Session
{
    static  function has($key)
    {
        return (bool) static::get($key);
    }
    static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    static function get($key, $default = NULL)
    {
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }
    static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }
    static function unflash()
    {
        unset($_SESSION['_flash']);
    }
    static function flush()
    {
        $_SESSION = [];
    }
    static function destroy()
    {
        static::flush();

        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
