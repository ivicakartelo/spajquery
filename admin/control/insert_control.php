<?php
 
// include database and object files
include_once '../../model/database.php';
include_once '../model/menu.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare post object
$post = new Post($db);
 
// set post property values
$post->name = $_POST['name'];
$post->content = $_POST['content'];
$post->published = date('Y-m-d H:i:s');

// create the post
if($post->create()){
    $post_arr=array(
        "status" => true,
        "menu_id" => $post->menu_id,
        "name" => $post->name,
        "content" => $post->content,
        "published" => $post->published
    );
}
else{
    $post_arr=array(
        "status" => false,
        "message" => "Something got wrong!"
    );
}
print_r(json_encode($post_arr));
?>