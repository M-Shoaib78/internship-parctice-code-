<?php

use Core\App;

$heading = "My only Notes";
$title = "Notes";

$db = App::container()->resolve('Core\Database');



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
