<?php

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
        $res = $c->loadCategoryById($categoryName);
        return $res;
    }
    public function getCategoryFollowers($categoryName)
    {
        $c = new Category();
        $res = $c->getCategoryFollowers($categoryName);
        return $res;
    }
    public function isUserFollower($categoryName, $userId)
    {
        $c = new Category();
        $res = $c->isUserFollower($categoryName, $userId);
        return $res;
    }
}
