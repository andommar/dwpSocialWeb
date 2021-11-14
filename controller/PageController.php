<?php
require_once('../bootstrapping.php');


if (isset($_POST["pageName"])) {
    // The variables we define here, can be called on the views below (when loaded)
    if (isset($_POST["data"])) {
        $data = $_POST["data"];
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
        case 'posts_filtered':
            include_once('../views/pages/posts_filtered.php');
            break;
        case 'category_posts':
            include_once('../views/pages/category_posts.php');
            break;
        default:
            $content = '<h1> This is what you came for' . $pageId . ' </h1>';
            break;
    }

    // echo $content;
}
