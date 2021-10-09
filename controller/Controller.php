<?php
spl_autoload_register(function ($class)
{include"models/".$class.".php";});

class Controller {


    // Post
    public function loadUserFeedPosts(){
        $p = new Post();
        $res = $p->loadUserFeedPosts();
        return $res;
    }

    public function loadCategoryPosts($categoryName){
        $p = new Post();
        $res = $p->loadCategoryPosts($categoryName);
        return $res;
    }

    public function newPost($userId, $title, $categoryName, $mediaUrl, $description){
        $p = new Post();
        $res = $p->newPost($userId, $title, $categoryName, $mediaUrl, $description);
        return $res;
    }

    // User
    public function isUserRegistered ($username, $email, $password){
        $u = new User();
        $res = $u->isUserRegistered($username, $email, $password);
        return $res;
    }

    //Comment
}


?>