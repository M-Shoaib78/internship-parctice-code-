<?php

use Core\Authenticator;
use Core\Session;
use http\froms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];
$form = new LoginForm();
if ($form->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect("/");
    }
    $form->error("email", "No matching accoun found for email and password");
}
Session::flash('errors', $form->errors());
Session::flash('old', [
    'email' => $_POST['email'],
]);
redirect("/login");
// return view('session/create.view.php', [
//     'errors' =>  $form->errors(),
//     'title' => "Login"
// ]);
