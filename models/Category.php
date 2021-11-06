<?php
require_once('DbConn.php');
require_once('User.php');
class Category
{
    //loadUserCategories not implemented yet
    public function loadCategories()
    {
        $db = new Dbconn();
        $sql = 'SELECT * FROM category';
        $result = $db->selectquery($sql);
        return $result;
    }
    public function loadCategoryById($categoryName)
    {
        $db = new Dbconn();
        $sql = 'SELECT * FROM `category` WHERE category_name = ?';
        $result = $db->selectQueryBind($sql, $categoryName);
        return $result;
    }
    public function getCategoryFollowers($categoryName)
    {
        $db = new Dbconn();
        $sql = 'SELECT COUNT(*) AS total FROM `user_category` WHERE category_name = ?';
        $result = $db->selectQueryBind($sql, $categoryName);
        return $result;
    }
    public function isUserFollower($categoryName, $userId)
    {
        $db = new Dbconn();
        $sql = 'SELECT COUNT(*) as total FROM `user_category` WHERE category_name = ? AND `user_id`=?';
        $arr = [$categoryName, $userId];
        $result = $db->selectQueryBindArr($sql, $arr);
        return $result;
    }
}
