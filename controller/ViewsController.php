<?php

include_once("PostController.php");
include_once("CommentController.php");

// ini_set('mssql.charset','utf-8');
if (isset($_POST["option"])) {

    $option = $_POST["option"];

    switch ($option) {
        case "create_post":
            $userid = $_POST["userId"];
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
    }
} else if (isset($_POST["formtype"])) {
    $form = $_POST["formtype"];

    $errors = [];
    $data = [];

    switch ($form) {
        case "comment":
            if (empty ($_POST['description']) && empty($_POST['image'])) {
                $errors['message'] = 'Type something or upload an image to send a comment';
            } else {
                // Message and image validation
                $c = new CommentController();
                $result = $c->newComment(1, 1, $_POST['description'], $_POST['image']);
            }

            if(!empty($errors)){
                $data['sucess'] = false;
                $data['errors'] = $errors;
            }else {
                $data['sucess'] = true;
                $data['errors'] = 'Success';
            }
            break;
    }

    echo json_encode($result);
};
