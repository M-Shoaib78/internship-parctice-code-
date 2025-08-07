<?php

namespace Core;

use Core\App;

class Authenticator
{
    function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email=:email", ['email' => $email])->find();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($email);
                return true;
            }
        }
        return false;
    }

    function login($value)
    {

        $_SESSION['user'] = [
            'email' => $value,
        ];
        session_regenerate_id(true);
    }
    function logout()
    {
        Session::destroy();
    }
}
