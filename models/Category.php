<?php
require_once('DbConn.php');

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
}
