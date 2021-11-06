<?php
require_once('../bootstrapping.php');


if (isset($_POST["pageName"])) {

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }
    $pageName = $_POST["pageName"];

    switch ($pageName) {
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
            $content = '<h1> This is what you came for' . $pageId . ' </h1>';
            break;
    }

    // echo $content;
}
