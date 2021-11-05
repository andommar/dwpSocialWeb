<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class CommentController
{
    // public function loadComments()
    // {
    //     $c = new Comment();
    //     $res = $c->loadComments();
    //     return $res;
    // }
}
