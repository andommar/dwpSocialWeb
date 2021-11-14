<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class TagController
{
    // public function loadTags()
    // {
    //     $t = new Tag();
    //     $res = $t->loadTags();
    //     return $res;
    // }
}
