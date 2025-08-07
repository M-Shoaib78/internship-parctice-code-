<?php

use Core\App;

$heading = "My only Notes";
$title = "Notes";

$db = App::container()->resolve('Core\Database');



$note = $db->query("select * from notes where id=:id", ['id' => $_GET['id']])->findOrFail();
$currentUserId = 3;
authorized($note['user_id'] != $currentUserId);


require view('/notes/edit.view.php', [
    'heading' => "Edit Note",
    'title' => "Edit Note",
    'errors' => [],
    'note' => $note

]);
