<?php
$heading = "Home";
$title = "Home";

$_SESSION['name'] = "shoaib";
require view('index.view.php', [
    'heading' => 'Home',
    'title' => 'Home'
]);
