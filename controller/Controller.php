<?php
spl_autoload_register(function ($class) {
    include "models/" . $class . ".php";
});
// require_once "models/Category.php";
// require_once "models/Post.php";
// require_once "models/User.php";


class Controller
{


    // Categories
    public function loadCategories()
    {
        $c = new Category();
        $res = $c->loadCategories();
        return $res;
    }
    // Post
    public function loadUserFeedPosts()
    {
        $p = new Post();
        $res = $p->loadUserFeedPosts();
        return $res;
    }

    public function loadCategoryPosts($categoryName)
    {
        $p = new Post();
        $res = $p->loadCategoryPosts($categoryName);
        return $res;
    }

    public function newPost($userId, $title, $categoryName, $mediaUrl, $description)
    {
        $p = new Post();
        $res = $p->newPost($userId, $title, $categoryName, $mediaUrl, $description);
        return $res;
    }

    public function registerUser($username, $email, $password)
    {
        $u = new User($username, $email, $password);
        $res = $u->registerUser($username, $email, $password);
        return $res;
    }

    // User
    public function isUserRegistered($username, $email, $password)
    {
        $u = new User($_SESSION['userId']);
        $res = $u->isUserRegistered($username, $email, $password);
        return $res;
    }

    public function getUserCategories()
    {
        $u = new User($_SESSION['userId']);
        $res = $u->getUserCategories();
        return $res;
    }

    public function getUserInfo()
    {
        $u = new User($_SESSION['userId']);
        $data = [
                    'username'=> $u->getUsername(),
                    'avatar'=> $u->getUserAvatar(),
                    'email'=> $u->getUserEmail()
        ];
        return $data;
    }

    //Comment
}
