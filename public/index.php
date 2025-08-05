<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    // dd($class);
    $class = str_replace("\\", '/', $class);

    require base_path($class . '.php');
});
require base_path("core/router.php");

// require base_path("Response.php");
// require base_path("Database.php");

// $config = require(base_path("config.php"));
// $db = new Database($config['database']);



// code not cleaned for remembering and understanding of learning concepts 
// echo "db" . $db . ' database instancess';
// $id = $_GET['id'];
// $query = "Select * from posts where id = :id";
// $posts = $db->query($query, [':id' => $id])->fetch(PDO::FETCH_ASSOC);
// echo "<li>" . $posts['title'] . "</li>";

// when using fetchAll()
// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
