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
        $userId = $_SESSION['userId'];
        $c = new CategoryModel();
        $res = $c->getUserCategories($userId);
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
    public function isUserFollower($categoryName)
    {
        $userId = $_SESSION['userId'];
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
