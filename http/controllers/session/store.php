<?php

use Core\Authenticator;
use http\froms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$auth = new Authenticator();
$signedIn = $auth->attempt($attributes['email'], $attributes['password']);
if (!$signedIn) {
    $form->error("email", "No matching account found for email and password")->throw();
}
redirect("/");

// if ($form->validate($email, $password)) {
// }
// Session::flash('errors', $form->errors());
// Session::flash('old', [
//     'email' => $_POST['email'],
// ]);
// redirect("/login");
// return view('session/create.view.php', [
//     'errors' =>  $form->errors(),
//     'title' => "Login"
// ]);
