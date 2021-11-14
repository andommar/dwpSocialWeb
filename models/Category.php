<?php
require_once('DbConn.php');
require_once('User.php');
class Category
{
    //loadUserCategories not implemented yet
    public function loadCategories()
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT * FROM category';
            $result = $db->selectquery($sql);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function loadCategoryById($categoryName)
    {
        try {
            $result = false;
            $db = new Dbconn();
            $sql = 'SELECT * FROM `category` WHERE category_name = ?';
            $result = $db->selectQueryBind($sql, $categoryName);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function getCategoryFollowers($categoryName)
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT COUNT(*) AS total FROM `user_category` WHERE category_name = ?';
            $result = $db->selectQueryBind($sql, $categoryName);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function isUserFollower($categoryName, $userId)
    {
        try {
            $db = new Dbconn();
            $sql = 'SELECT COUNT(*) as total FROM `user_category` WHERE category_name = ? AND `user_id`=?';
            $arr = [$categoryName, $userId];
            $result = $db->selectQueryBindArr($sql, $arr);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
    public function registerUserCategories($userId, $categories)
    {
        try {
            $db = new DbConn();
            $db->dbConn->beginTransaction();
            for ($i = 0; $i < count($categories); $i++) {
                $arr = [$userId, $categories[$i]];
                $sql = 'INSERT INTO user_category (user_id,category_name) VALUES (?,?)';
                $result = $db->executeQueryBindArr($sql, $arr);
            }
            $db->dbConn->commit();
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
            $db->dbConn->rollBack();
        }
    }
}
