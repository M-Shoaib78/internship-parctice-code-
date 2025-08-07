<?php

use Core\App;
use Core\Validator;

$db = App::container()->resolve('Core\Database');


// finding the note in db 
$note = $db->query("select * from notes where id=:id", ['id' => $_POST['id']])->findOrFail();
$currentUserId = 3;
// authorize it
authorized($note['user_id'] != $currentUserId);
// validation 
$errors = [];
if (! Validator::string($_POST['body'], 20, 1000)) {
    $errors['body'] = 'A body cannot be less than 20 and more then 1000 characters is Required';
}

if (count($errors)) {

    return view('/notes/edit.view.php', [
        'heading' => "Edit Note",
        'title' => "Edit Note",
        'errors' => $errors,
        'note' => $note
    ]);
}
$db->query("UPDATE notes SET body=:body WHERE id=:id", [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header("location: /notes");
die;
