<?php

class CategoryController
{
    // Categories
    public function loadCategories()
    {
        $c = new CategoryModel();
        $res = $c->loadCategories();
        return $res;
    }

    public function getUserCategories()
    {
        $c = new UserModel($_SESSION['userId']);
        $res = $c->getUserCategories();
        return $res;
    }
    public function loadCategoryById($categoryName)
    {
        $c = new CategoryModel();
        $res = $c->loadCategoryById($categoryName);
        return $res;
    }
    public function getCategoryFollowers($categoryName)
    {
        $c = new CategoryModel();
        $res = $c->getCategoryFollowers($categoryName);
        return $res;
    }
    public function isUserFollower($categoryName, $userId)
    {
        $c = new CategoryModel();
        $res = $c->isUserFollower($categoryName, $userId);
        return $res;
    }
    public function registerUserCategories($userId, $categories)
    {
        $c = new CategoryModel();
        $res = $c->registerUserCategories($userId, $categories);
        return $res;
    }
}
