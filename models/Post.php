<?php

require_once('db/DbConn.php');

class Post
{


  //It's missing userid parameter
  public function loadUserFeedPosts()
  {
    $db = new Dbconn();
    $sql = 'SELECT u.user_id,u.username,u.avatar,u.rank, p.* FROM user u inner join post p where u.user_id = p.user_id';
    $result = $db->selectquery($sql);
    return $result;
  }

  public function loadCategoryPosts($categoryName)
  {
    $db = new Dbconn();
    $sql = 'SELECT * FROM post where category_name = $categoryName';
    $result = $db->selectquery($sql);
    return $result;
  }

  public function newPost($userId, $title, $categoryName, $mediaUrl, $description)
  {
    $db = new DbConn();
    $date = date('Y-m-d H:i:s');
    $sql = 'INSERT INTO post (`user_id`, title, category_name, media_url, `description`, `datetime`, up_votes, down_votes)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)';
            // VALUES ( :userId, :title, :categoryName, :mediaUrl, :descriptionInfo, :postdate, :upvote, :downvote)';
            // VALUES ($userId, '$title', '$categoryName', '$mediaUrl', '$description', '$date', 0, 0)';
    $arr = [$userId, $title, $categoryName, $mediaUrl, $description, $date, 0, 0];

    $result = $db->executeQueryBindArr($sql, $arr);
    return $result;
  }
}
