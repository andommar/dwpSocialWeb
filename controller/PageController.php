<?php
require_once('../bootstrapping.php');


if (isset($_POST["id"])) {

    $id = $_POST["pageId"];
    $show_post_ID = $_POST["id"];

    switch ($id) {
        case 'userfeed':
            include_once('../views/pages/userfeed.php');
            break;
        case 'new_post':
            include_once('../views/pages/new_post.php');
            break;
        case 'show_post':
            include_once('../views/pages/show_post.php');
            break;
        default:
            $content = '<h1> This is what you came for' . $id . ' </h1>';
            break;
    }

    // echo $content;
}
