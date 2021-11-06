<?php


require_once('DbConn.php');

class Comment
{

    public function loadCommentsbyPostId($postId)
    {
        $db = new Dbconn();
        $sql = 'SELECT COUNT(*) as total FROM `comment` WHERE post_id=?';
        $result = $db->selectQueryBind($sql, $postId);
        return $result;
    }
}
