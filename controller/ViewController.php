<?php
include_once("UserController.php");
include_once("PostController.php");

// $session = new SessionHandle();

// Validates fields, returns errors to show them in the View
// If everything is okay calls the Controller to execute the specific query
function validateSignUp($username, $email, $password, $password2, $termsofuse, $message)
{
    $username = trim($username);
    $email = trim($email);
    $password = trim($password);
    $password2 = trim($password2);
    $termsofuse = $termsofuse;

    $email_regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

    /* Empty fields */
    if (empty($username)) {
        $message['username'] = 'Username cannot be empty';
    } else if (empty($email)) {
        $message['email'] = 'Email cannot be empty';
    } else if (empty($password)) {
        $message['password'] = 'Password cannot be empty';
    } else if (empty($password2)) {
        $message['password2'] = 'Password cannot be empty';
    } else if (!$termsofuse) {
        $message['termsofuse'] = 'You must accept the Terms of Use.';
    }

    // Delete array elements with no errors
    foreach ($message as $key => $value) {
        if (empty($value)) unset($message[$key]);
    }
    // If no validation errors
    if (empty($message)) {

        $u = new UserController();
        if ($u->registerUser($username,  $email,  $password)) {
            $message['database'] = 'User succesfully created';
        } else {
            $message['database'] = 'Error creating the user';
        }
    }
    return $message;
}

// Validates new post form

function validateNewPost($title, $category, $mediaUrl, $description, $message)
{

    $title = trim($title);
    $description = trim($description);

    if (empty($title)) {
        $message['title'] = 'Title cannot be empty';
    } else if (empty($category) || $category == 'Category') {
        $message['category'] = 'Please choose a category for your post';
    } else if (empty($description)) {
        $message['description'] = 'Add a description for your post';
    }

    // Delete array elements with no errors
    foreach ($message as $key => $value) {
        if (empty($value)) unset($message[$key]);
    }
    // If no validation errors
    if (empty($message)) {
        $p = new PostController();
        if ($p->newPost($_SESSION['userId'], $title, $category, $mediaUrl, $description)) {
            $message['database'] = 'Post successfully created';
        } else {
            $message['database'] = 'An error ocurred';
        }
    }

    return $message;
}
