<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class PostController
{

    public function loadUserFeedPosts()
    {
        $p = new Post();
        $res = $p->loadUserFeedPosts();
        return $res;
    }
    public function loadPostById($postId)
    {
        $p = new Post();
        $res = $p->loadPostById($postId);
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
}
