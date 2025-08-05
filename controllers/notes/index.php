<?php

use Core\Database;


$config = require(base_path("config.php"));
$db = new Database($config['database']);
$notes = $db->query("select * from notes where user_id=3")->get();

// dd($notes);

require view('notes/index.view.php', [
    'heading' => 'My Notes',
    'title' => 'Notes',
    'notes' => $notes
]);
