<?php

use Core\Database;

$heading = "My only Notes";
$title = "Notes";

$config = require(BASE_PATH . "config.php");
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Delete the current post
    $note = $db->query("select * from notes where id=:id", ['id' => $_GET['id']])->findOrFail();
    $currentUserId = 7;
    authorized($note['user_id'] != $currentUserId);

    $db->query("DELETE FROM notes WHERE id=:id ", [
        'id' => $_POST['id']
    ]);
    header('Location:/notes');
    exit();
} else {

    $note = $db->query("select * from notes where id=:id", ['id' => $_GET['id']])->findOrFail();
    $currentUserId = 3;

    // new function in db has created
    // if (!$note) {
    //     abort();
    // }

    authorized($note['user_id'] != $currentUserId);
    // if ($note['user_id'] != $currentUserId) {
    //     abort(Response::FORBIDDEN);
    // }

    require view('notes/show.view.php', [
        'heading' => 'My Note',
        'title' => 'Notes',
        'note' => $note,
    ]);
}
