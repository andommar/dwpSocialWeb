<?php
spl_autoload_register(function ($class) {
    include "models/" . $class . ".php";
});

class CategoryController
{
    // Categories
    public function loadCategories()
    {
        $c = new Category();
        $res = $c->loadCategories();
        return $res;
    }

    public function getUserCategories()
    {
        $c = new User($_SESSION['userId']);
        $res = $c->getUserCategories();
        return $res;
    }
}
