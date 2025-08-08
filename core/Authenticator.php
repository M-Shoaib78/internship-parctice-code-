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
                Self::login($email);
                return true;
            }
        }
        return false;
    }
    static function userExist($attributes)
    {
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email=:email", ['email' => $attributes['email']])->find();
        if ($user) {
            $_SESSION['user']['email'] = $attributes['email'];
            header('location: /');
            exit();
        } else {
            $db->query("INSERT INTO users(email, password) VALUES(:email,:password)", [
                'email' => $attributes['email'],
                'password' => password_hash($attributes['password'], PASSWORD_BCRYPT)
            ]);
        }
    }

    static function login($value)
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
