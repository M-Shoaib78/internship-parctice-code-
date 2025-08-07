<?php

use Core\App;

// use Core\Database;//replaced with below code 


// $config = require(base_path("config.php"));
// $db = new Database($config['database']);

$db = App::container()->resolve('Core\Database');

$notes = $db->query("select * from notes where user_id=3")->get();

// dd($notes);

require view('notes/index.view.php', [
    'heading' => 'My Notes',
    'title' => 'Notes',
    'notes' => $notes
]);
