<?php
require_once ('../bootstrapping.php');


if(isset($_POST["id"])){

    $id = $_POST["id"];

    switch ($id) {
        case 1:
            include_once('../views/pages/userfeed.php');
            break;
        case 2:
            include_once('../views/pages/new_post.php');
            break;
        case 3:
            $content = '<h1> This is what you came for'. $id .' </h1>';
            break;

    }

    // echo $content;
}



?>

