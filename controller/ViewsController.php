<?php

include_once("PostController.php");
include_once("VoteController.php");

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

        case "userfeed":
            $userId = $_POST["userId"];
            $filter = $_POST["userfeedFilter"];
            $p = new PostController();
            $posts2 = $p->loadUserFeedPostsFiltered($userId, $filter);
            echo json_encode($posts2);
            break;
        case "userfeed_votes":
            $userId = $_POST["userId"];
            $postId = $_POST["postId"];
            $isPositive = $_POST["isPositive"];
            $v = new VoteController();
            $v = $v->ratePost($userId, $postId, $isPositive);
            echo json_encode($v);
            // echo $v;
            break;
    }
}
