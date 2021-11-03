<?php
spl_autoload_register(function ($class) {
    include "../models/" . $class . ".php";
});

class MediaController
{
    // public function loadMedia()
    // {
    //     $m = new Media();
    //     $res = $m->loadMedia();
    //     return $res;
    // }
}
