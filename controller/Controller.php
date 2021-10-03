<?php
require_once "models/Post.php";

class Controller {

    public function load_posts(){
        $p = new Post();
        $res = $p->load_posts();
        return $res;
    }
}


?>