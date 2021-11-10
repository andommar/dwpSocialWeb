<?php


require_once('DbConn.php');

class Comment
{

    public function loadCommentsbyPostId($postId)
    {
        $db = new Dbconn();
        $sql = 'SELECT c.comment_id, c.description, c.user_id, u.username, u.avatar, c.media_id, c.up_votes, c.down_votes
                from `comment` c 
                inner join post p on c.post_id = p.post_id
                inner join `user` u on u.user_id = c.user_id
                where p.post_id = ?';
        $result = $db->selectQueryBind($sql, $postId);
        return $result;
    }
    
    public function newComment($userId, $postId, $description, $mediaUrl)
    {
        $db = new DbConn();
        $date = date('Y-m-d H:i:s');
        $arr = [$userId, $postId, $description, $mediaUrl, 0, 0, $date];
        $sql = 'INSERT INTO `comment` (`user_id`, post_id, `description`, media_url, up_votes, down_votes, `datetime`)
                VALUES (?,?,?,?,?,?,?)';
        $result = $db->executeQueryBindArr($sql,$arr);
        return $result;
    }
}
