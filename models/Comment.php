<?php


require_once('DbConn.php');

class Comment
{

    public function loadCommentsbyPostId($postId)
    {
        try {

            $result = false;
            $db = new Dbconn();
            $sql = 'SELECT c.comment_id, c.description, c.user_id, u.username, u.avatar, c.media_url, c.up_votes, c.down_votes
                FROM `comment` c 
                INNER JOIN post p ON c.post_id = p.post_id
                INNER JOIN `user` u ON u.user_id = c.user_id
                WHERE p.post_id = ? ORDER BY c.`datetime` DESC';
            $result = $db->selectQueryBind($sql, $postId);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }

    public function newComment($userId, $postId, $description, $mediaUrl)
    {
        try {


            $result = false;
            $db = new DbConn();
            $date = date('Y-m-d H:i:s');
            $arr = [$userId, $postId, $description, $mediaUrl, 0, 0, $date];
            $sql = 'INSERT INTO `comment` (`user_id`, post_id, `description`, media_url, up_votes, down_votes, `datetime`)
                VALUES (?,?,?,?,?,?,?)';
            $result = $db->executeQueryBindArr($sql, $arr);
            return $result;
        } catch (\PDOException $ex) {
            print($ex->getMessage());
        }
    }
}
