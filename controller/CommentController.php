<?php
// spl_autoload_register(function ($class) {
//     include "../models/" . $class . ".php";
// });

class CommentController
{
    public function loadCommentsbyPostId($postId)
    {
        $c = new Comment();
        $res = $c->loadCommentsbyPostId($postId);
        return $res;
    }

    public function newComment($userId, $postId, $description, $mediaUrl)
    {
        $c = new Comment();
        $res = $c->newComment($userId, $postId, $description, $mediaUrl);
        return $res;
    }
}
