<?php
spl_autoload_register(function ($class) {
    $pathModel = '../models/' . $class . '.php';

    if (file_exists($pathModel)) {
        require_once $pathModel;
    }
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
    public function loadCategoryById($categoryName)
    {
        $c = new Category();
        $res = $c->loadCategories($categoryName);
        return $res;
    }
}
