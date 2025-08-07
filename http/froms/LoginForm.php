<?php

namespace http\froms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = "please provide a valid email";
        }
        if (!Validator::string($password, 6, 20)) {
            $this->errors['password'] = "password must valid";
        }
        return empty($this->errors);
    }
    function errors()
    {
        return $this->errors;
    }
    function error($feild, $message)
    {
        $this->errors[$feild] = $message;
    }
}
