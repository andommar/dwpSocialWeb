<?php
// spl_autoload_register(function ($class) {
//     include "../models/" . $class . ".php";
// });

class CommentController
{
    public function loadCommentsbyPostId($postId)
    {
        $c = new CommentModel();
        $res = $c->loadCommentsbyPostId($postId);
        return $res;
    }

    public function newComment($userId, $postId, $description, $mediaUrl)
    {
        $c = new CommentModel();
        $res = $c->newComment($userId, $postId, $description, $mediaUrl);
        return $res;
    }
}
