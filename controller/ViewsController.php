<?php

// Requires 

require_once('../bootstrapping.php');


// Declarations 

// File size 
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$mediaPath = "../views/web/img/media/";
$avatarPath = "../views/web/img/avatars/";
$msg = array(
    "id" => "",
    "text" => "",
);


//This handles the incoming data from AJAX - Post requests 
if (isset($_POST["option"])) {

    $option = $_POST["option"];

    switch ($option) {

        case "login":
            global $msg;
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Data validation 
            if (validateUsername($username) && validatePassword($password)) {
                $c = new LoginController();
                $msg = $c->loginUser($username, $password);
                if ($msg) echo json_encode($msg); // We send the validation error message
            } else {
                echo json_encode($msg); // We send the validation error message
            }
            break;
        case "signup":
            global $msg;
            global $newUserId;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $avatar = generate_rnd_avatar();
            // Data validation 
            if (validateSignUpFields($username, $email, $password, $password2)) {   // Validation OK
                // Password hashing
                $iterations = ['cost' => 15];
                $hashed_password = password_hash($password, PASSWORD_BCRYPT, $iterations);

                $c = new UserController();
                $result = $c->registerUser($username, $email, $hashed_password, $avatar);
                if (is_string($result)) {
                    $newUserId = $result;
                    $_SESSION['userId'] = $newUserId;
                }
            }
            echo json_encode($result);
            break;
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
                $inputPassword = $_POST["password"];
                $u = new UserController();
                if ($inputPassword == $u->getUserPassword()) {

                    if (!empty($_POST["email"])) {
                        $email = $_POST["email"];
                        $u->setUser()->setUserEmail($email);
                    }

                    if (!empty($_POST["password1"]) && !empty($_POST["password2"])) {
                        $password1 = $_POST["password1"];
                        $password2 = $_POST["password2"];
                        if (($password1 === $password2)) {
                            $u->setUser()->setUserPassword($password1);
                        } else {
                            $errors['password1'] = "The passwords don't match";
                            $errors['password2'] = "The passwords don't match";
                        }
                    } else {
                        if (empty($_POST["password1"])) {
                            if (!empty($_POST["password2"])) {
                                $errors['password1'] = "Type the new password";
                            }
                        } elseif (!empty($_POST["password1"])) {
                            if (empty($_POST["password2"])) {
                                $errors['password2'] = "Type the new password";
                            }
                        }
                    }
                } else {
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
                if ($imgFile['size'] > 2 * MB) {
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

            $userId = $_SESSION['userId'];
            // categories parameter is not null
            if (isset($_POST["categories"]) && $_POST["categories"] != null) {

                $categories = $_POST["categories"];

                if (sizeof($categories) < 2 || empty($categories)) {
                    $msg["id"] = "categories";
                    $msg["text"] = "You must select at least 2 categories in order to complete the registration.";
                    echo json_encode($msg); // We send the validation error message
                } else {
                    $c = new CategoryController();
                    $result = $c->registerUserCategories($userId, $categories);
                    echo $result;
                }
            }
            // categories parameter is null
            else {
                $msg["id"] = "categories";
                $msg["text"] = "You must select at least 2 categories in order to complete the registration.";
                echo json_encode($msg); // We send the validation error message
            }

            break;
    }
}

// Validation functions
function validateUsername($username)
{

    $dataIsValid = true;
    global $msg;
    $username = htmlspecialchars(trim($username)); // sanitizes input before sql query and removes spaces
    $username = str_replace(' ', '', $username);    // removes any space between characters
    if (empty($username)) {

        $msg["id"] = "username";
        $msg["text"] = "Username cannot be empty.";
        $dataIsValid = false;
    }

    return $dataIsValid;
}
function validatePassword($password)
{

    $dataIsValid = true;
    global $msg;
    $password = htmlspecialchars(trim($password));
    $password = str_replace(' ', '', $password);
    if (empty($password)) {

        $msg["id"] = "password";
        $msg["text"] = "Password cannot be empty.";
        $dataIsValid = false;
    }

    return $dataIsValid;
}

function generate_rnd_avatar()
{
    $rnd_number = rand(1, 8);
    $avatar = 'avatar_' . $rnd_number . '.png';
    return $avatar;
}
function validateSignUpFields($username, $email, $password, $password2)
{
    global $msg;
    $isDataValid = false;
    // Variables sanitizing
    $username = htmlspecialchars(trim($username));
    $username = str_replace(' ', '', $username);

    $email = htmlspecialchars(trim($email));
    $email = str_replace(' ', '', $email);

    $password = htmlspecialchars(trim($password));
    $password = str_replace(' ', '', $password);

    $password2 = htmlspecialchars(trim($password2));
    $password2 = str_replace(' ', '', $password2);

    // Regex
    $username_regexp = "/^[0-9A-Za-z\_]+$/";
    $email_regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
    $password_regexp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,30}$/";


    // USERNAME
    if (empty($username)) {
        $msg["id"] = "username";
        $msg["text"] = "Username cannot be empty.";
    }
    // Username length
    else if (strlen($username) < 4) {
        $msg["id"] = "username";
        $msg["text"] = "Username must have at least 4 characters.";
    } else if (strlen($username) > 30) {
        $msg["id"] = "username";
        $msg["text"] = "Username cannot exceed 30 characters.";
    }
    // Username is not the accepted type
    else if (!preg_match($username_regexp, $username)) {
        $msg["id"] = "username";
        $msg["text"] = "Username can only contain letters, numbers and underscores.";
    }
    // EMAIL
    else if (empty($email)) {
        $msg["id"] = "email";
        $msg["text"] = "Email cannot be empty.";
    }
    // Email is not the accepted type
    else if (!preg_match($email_regexp, $email)) {
        $msg["id"] = "email";
        $msg["text"] = "This email is not valid.";
    }
    // PASSWORD
    else if (empty($password)) {
        $msg["id"] = "password";
        $msg["text"] = "Password cannot be empty.";
    }
    // Password length
    else if (strlen($password) < 6) {
        $msg["id"] = "password";
        $msg["text"] = "Password must have at least 6 characters.";
    } else if (strlen($password) > 30) {
        $msg["id"] = "password";
        $msg["text"] = "Password cannot exceed 30 characters.";
    }
    // Password is not the accepted type
    else if (!preg_match($password_regexp, $password)) {
        $msg["id"] = "password";
        $msg["text"] = "Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.";
    }
    // PASSWORD 2
    else if (empty($password2)) {
        $msg["id"] = "password2";
        $msg["text"] = "Password cannot be empty.";
    }
    // PASSWORD VS PASSWORD  2
    // Passwords have different values
    else if (!($password === $password2)) {
        $msg["id"] = "password2";
        $msg["text"] = "Passwords must be identical.";
    } else {
        $isDataValid = true;
    }
    return $isDataValid;
}
