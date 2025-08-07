<?php

use Core\App;

$heading = "My only Notes";
$title = "Notes";

// code changed using container 
// $config = require(BASE_PATH . "config.php");
// $db = new Database($config['database']);

$db = App::container()->resolve('Core\Database');

//Delete the current post
$note = $db->query("select * from notes where id=:id", ['id' => $_GET['id']])->findOrFail();
$currentUserId = 3;
authorized($note['user_id'] != $currentUserId);

$db->query("DELETE FROM notes WHERE id=:id ", [
    'id' => $_POST['id']
]);
header('Location:/notes');
exit();
