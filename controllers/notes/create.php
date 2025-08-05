<?php

use Core\Database;
use Core\Validator;

require base_path("validator.php");
$config = require base_path("config.php");
$db = new Database($config['database']);

// dd(Validator::email("dasdsad@gmail.com"));

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (! Validator::string($_POST['body'], 20, 1000)) {
        $errors['body'] = 'A body cannot be less than 20 and more then 1000 characters is Required';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body,user_id) VALUES(:body,:user_id)", [
            'body' => $_POST['body'],
            'user_id' => '3'
        ]);
    }
}
require view('/notes/create.view.php', [
    'heading' => "Create Note",
    'title' => "Create Note",
    'errors' => $errors,

]);
