<?php

namespace Core;

use Exception;


class ValidationException extends Exception
{
    public readonly array $errors;
    public readonly array $old;
    static function throw($errors, $old)
    {
        // dd("Dasdasd");
        $instance = new static;
        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}
