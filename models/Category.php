<?php
require_once('../db/DbConn.php');

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
}
