<?php

include_once("PostController.php");

// ini_set('mssql.charset','utf-8');
if (isset($_POST["option"])) {

    $option = $_POST["option"];

    switch ($option) {
        case "create_post":
            $userid = $_POST["userid"];
            $title = $_POST["title"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $imgfile = $_POST["imgfile"];

            $p = new PostController();
            $p->newPost($userid, $title, $category, $imgfile, $description);
            break;
    }
}
