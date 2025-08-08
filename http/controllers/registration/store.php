<?php

use Core\Authenticator;
use Core\Session;
use http\froms\LoginForm;

try {
    $form = LoginForm::validate([
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);
    Authenticator::userExist([
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);
    Authenticator::login($_POST['email']);

    header('location: /');
    exit();
} catch (\Core\ValidationException $e) {

    return view('registration/create.view.php', [
        'errors' => $e->errors,
        'old' => $e->old['email'],
        'title' => 'Register',
    ]);
}

// $email = $_POST['email'];
// $password = $_POST['password'];
// $errors = [];

// // validation
// if (!Validator::email($email)) {
//     $errors['email'] = "please provide a valid email";
// }
// if (!Validator::string($password, 6, 20)) {
//     $errors['password'] = "password must be atleast 6-20 characters";
// }
// if (!empty($errors)) {
//     return view('registration/create.view.php', [
//         'errors' => $errors,
//         'title' => "Register"
//     ]);
// }


// if user already in db and else 
// $db = App::resolve(Database::class);
// $user = $db->query("SELECT * FROM users WHERE email=:email", ['email' => $email])->find();
// if ($user) {
//     header('location: /');
//     exit();
// } else {
// dd("hee");
// $db->query("INSERT INTO users(email, password) VALUES(:email,:password)", [
//     'email' => $email,
//     'password' => password_hash($password, PASSWORD_BCRYPT)
// ]);

// login($email);
