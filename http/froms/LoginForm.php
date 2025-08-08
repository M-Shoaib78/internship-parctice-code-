<?php

namespace http\froms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public $attributes;
    function __construct($attributes)
    {
        $this->attributes = $attributes;
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "please provide a valid email";
        }
        if (!Validator::string($attributes['password'], 6, 20)) {
            $this->errors['password'] = "password must valid";
        }
    }
    static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }
    function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }
    function failed()
    {
        return count($this->errors);
    }
    function errors()
    {
        return $this->errors;
    }
    function error($feild, $message)
    {
        $this->errors[$feild] = $message;
        return $this;
    }
}
