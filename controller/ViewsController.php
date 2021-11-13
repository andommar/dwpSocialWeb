<?php

include_once("PostController.php");
include_once("VoteController.php");
include_once("CommentController.php");
include_once("CategoryController.php");

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
        case "rate_post":
            $userId = $_POST["userId"];
            $postId = $_POST["postId"];
            $isPositive = $_POST["isPositive"];
            $v = new VoteController();
            $v = $v->ratePost($userId, $postId, $isPositive);
            echo $v;
            break;
        case "user_votes":
            $userId = $_POST["userId"];
            $v = new VoteController();
            $v = $v->getUserRatedPosts($userId);
            echo json_encode($v);
            break;
        case "singlepost_user_votes":
            $userId = $_POST["userId"];
            $postId = $_POST["postId"];
            $v = new VoteController();
            $v = $v->getUserRatedPostByPostId($userId, $postId);
            echo json_encode($v);
            break;
        case "post_votes":
            $postId = $_POST["postId"];
            $v = new VoteController();
            $v = $v->getPostVotes($postId);
            echo json_encode($v);
            break;
        case "submit_post_comment":
            $formData = $_POST["formData"];
            if ($formData["formtype"]) {
                $form = $_POST["formtype"];
                $errors = [];
                $data = [];
                $postId = $_POST["postId"];
                $userId = $_POST["userId"];
                if (empty($formData['description']) && empty($formData['image'])) {
                    $errors['message'] = 'Type something or upload an image to send a comment';
                } else {
                    // Message and image validation
                    $c = new CommentController();
                    $result = $c->newComment($userId, $postId, $formData['description'], $formData['image']);
                }

                if (!empty($errors)) {
                    $data['sucess'] = false;
                    $data['errors'] = $errors;
                } else {
                    $data['sucess'] = true;
                    $data['errors'] = 'Success';
                }
                echo json_encode($result);
            }
            break;
        case "category_selection":
            $userId = $_POST["userId"];
            $categories = $_POST["categories"];
            $c = new CategoryController();
            $result = $c->registerUserCategories($userId, $categories);
            echo $result;
            break;
    }
}
