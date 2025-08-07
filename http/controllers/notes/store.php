<?php

use Core\App;
use Core\Validator;

$db = App::container()->resolve('Core\Database');

$errors = [];
if (! Validator::string($_POST['body'], 20, 1000)) {
    $errors['body'] = 'A body cannot be less than 20 and more then 1000 characters is Required';
}

if (!empty($errors)) {
    return view('/notes/create.view.php', [
        'heading' => "Create Note",
        'title' => "Create Note",
        'errors' => $errors,
    ]);
}
$db->query("INSERT INTO notes(body,user_id) VALUES(:body,:user_id)", [
    'body' => $_POST['body'],
    'user_id' => '3'
]);
header("location:/notes");
die();
