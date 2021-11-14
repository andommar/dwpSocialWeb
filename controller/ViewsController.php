<?php

// ----Requires----

require_once('../bootstrapping.php');
// include_once("PostController.php");
// include_once("VoteController.php");
// include_once("CommentController.php");

// ----End of requires----

// ----Declarations----

// File size 
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$mediaPath = "../views/web/img/media/";
$avatarPath = "../views/web/img/avatars/";

// ----End of declarations----


//Views send through POST variables/forms and the switch-case handles the incoming data
if (isset($_POST["option"])) {

    $option = $_POST["option"];

    switch ($option) {

            // Validations cases
        case "new_post_form":

            $errors = [];
            $data = [];

            if (empty($_POST["title"])) {
                $errors['title'] = 'New post must have a title';
            }
            if ($_POST["category"] == 'Category') {
                $errors['category'] = 'Select the category of your post';
            }
            if (empty($_POST["description"])) {
                $errors['description'] = 'Select the description of your post';
            }

            // If inputs arent empty and user has chosen a category
            if (empty($errors)) {
                $userid = $_POST["userId"];
                $title = $_POST["title"];
                $category = $_POST["category"];
                $description = $_POST["description"];
                $imgFile = $_FILES['imgfile'];
                $imgFileName = strtolower($_FILES['imgfile']['name']);
                $imgFiltype = $imgFile['type'];
                // $imgFileExtension = strtolower(pathinfo($imgFileName, PATHINFO_EXTENSION)); //returns file extension in lowercases
                // $imgFileName = $imgFileName . '.' . $imgFileExtension;

                // Image upload validation. Verify image file extension. 
                if (($imgFiltype == "image/jpeg" ||
                    $imgFiltype == "image/jpg"   ||
                    $imgFiltype == "image/png"   ||
                    $imgFiltype == "image/gif")) {
                    //and size meet the criteria 
                    if ($imgFile['size'] > 2 * MB) {
                        $error['image'] = "Max image size is 5MB";
                    } else {
                        // If there's no errors we add a unique string as a prefix to the file name
                        $prefix = uniqid();
                        $imgFileName = $prefix . '_' . $imgFileName;
                        move_uploaded_file($imgFile['tmp_name'], $mediaPath . $imgFileName);
                        $p = new PostController();
                        $p->newPost($userid, $title, $category, $imgFileName, $description);
                    }
                } else {
                    $error['image'] = "Only jpeg, jpg, png or gif images allowed";
                }
            }

            if (!empty($errors)) {
                $data['success'] = false;
                $data['errors'] = $errors;
            } else {
                $data['success'] = true;
                $data['message'] = 'Success!';
            }

            echo json_encode($data);
            break;
        
        case "profile_form":
            $errors = [];
            $data = [];

            if (!empty($_POST["password"])) {
                $inputPassword =$_POST["password"];
                $u = new UserController();
                if($inputPassword == $u->getUserPassword()){

                    if (!empty($_POST["email"])) {
                        $email = $_POST["email"];
                        $u->setUser()->setUserEmail($email);
                    }

                    if (!empty($_POST["password1"]) && !empty($_POST["password2"])) {
                        $password1 = $_POST["password1"];
                        $password2 = $_POST["password2"];
                        if(($password1===$password2)){
                            $u->setUser()->setUserPassword($password1);
                        } else {
                            $errors['password1'] = "The passwords don't match";
                            $errors['password2'] = "The passwords don't match";
                        }
                    } else {
                        if (empty($_POST["password1"]) ){
                            if(!empty($_POST["password2"])){
                                $errors['password1'] = "Type the new password";
                            }
                        } elseif (!empty($_POST["password1"])){
                            if(empty($_POST["password2"])){
                                $errors['password2'] = "Type the new password";
                            } 
                        }
                    }


                }else {
                    $errors['password'] = 'Incorrect password';
                }
            } else {
                $errors['password'] = 'Type your password to save your changes';
            }

            if (!empty($errors)) {
                $data['success'] = false;
                $data['errors'] = $errors;
            } else {
                $data['success'] = true;
                $data['message'] = 'Success!';
            }
            echo json_encode($data);


            break;

        case "new_avatar_form":

            // Code similar to above. An image validation function needs to be done

            $errors = [];
            $data = [];

            $imgFile = $_FILES['new-avatar-upload'];
            $imgFileName = strtolower($_FILES['new-avatar-upload']['name']);
            $imgFiltype = $imgFile['type'];

            if (($imgFiltype == "image/jpeg" ||
            $imgFiltype == "image/jpg"   ||
            $imgFiltype == "image/png"   ||
            $imgFiltype == "image/gif")) {
                //and size meet the criteria 
                if ($imgFile['size'] > 2*MB) {
                    $error['avatar'] = "Max image size is 2MB";
                } else {
                    // If there's no errors we add a unique string as a prefix to the file name
                    $prefix = uniqid();
                    $imgFileName = $prefix . '_' . $imgFileName;
                    move_uploaded_file($imgFile['tmp_name'], $avatarPath . $imgFileName);
                    $u = new UserController();
                    $u->setUser()->setUserAvatar($imgFileName);
                }
            } else {
                $error['avatar'] = "Only jpeg, jpg, png or gif images allowed";
            }
            if (!empty($errors)) {
                $data['success'] = false;
                $data['errors'] = $errors;
            } else {
                $data['success'] = true;
                $data['message'] = 'Success!';
            }
            echo json_encode($data);

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
