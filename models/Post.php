<?php

require_once('DbConn.php');

class Post
{




  public function loadUserFeedPostsFiltered($userId, $filter)
  {
    // Filter: latest, popular, oldest, unpopular

    $db = new Dbconn();
    $sql = "";
    switch ($filter) {
        // Most recent posts
      case "latest":

        $sql = 'SELECT u.user_id,u.username,u.avatar, p.*, c.icon FROM user u, post p, category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND p.category_name IN (SELECT category_name FROM user_category WHERE `user_id` = ?) ORDER BY `datetime` DESC';

        break;
        // Oldest posts
      case "oldest":

        $sql = 'SELECT u.user_id,u.username,u.avatar, p.*, c.icon FROM user u, post p, category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND p.category_name IN (SELECT category_name FROM user_category WHERE `user_id` = ?) ORDER BY `datetime`';

        break;
        // Most voted posts
      case "popular":

        $sql = 'SELECT u.user_id,u.username,u.avatar, p.*, c.icon FROM user u, post p, category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND p.category_name IN (SELECT category_name FROM user_category WHERE `user_id` = ?) ORDER BY p.up_votes DESC';

        break;

        // Most unvoted posts
      case "unpopular":

        $sql = 'SELECT u.user_id,u.username,u.avatar, p.*, c.icon FROM user u, post p, category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND p.category_name IN (SELECT category_name FROM user_category WHERE `user_id` = ?) ORDER BY p.down_votes DESC';

        break;
    }
    $result = $db->selectQueryBind($sql, $userId);
    return $result;
  }

  public function loadPostById($postId)
  {
    $db = new Dbconn();
    $sql = 'SELECT u.user_id,u.username,u.avatar,u.rank, p.*, c.icon FROM user u,post p,category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND p.post_id = ?';
    $result = $db->selectQueryBind($sql, $postId);
    return $result;
  }
  public function loadCategoryPosts($categoryName)
  {
    $db = new Dbconn();
    $sql = 'SELECT u.user_id,u.username,u.avatar, p.*, c.icon FROM user u, post p, category c WHERE u.user_id = p.user_id AND p.category_name = c.category_name AND c.category_name = ? ORDER BY `datetime` DESC';
    $result = $db->selectQueryBind($sql, $categoryName);
    return $result;
  }

  public function newPost($userId, $title, $categoryName, $mediaUrl, $description)
  {
    $db = new DbConn();
    $date = date('Y-m-d H:i:s');
    $sql = 'INSERT INTO post (`user_id`, title, category_name, media_url, `description`, `datetime`)
            VALUES ( ?, ?, ?, ?, ?, ?)';
    // VALUES ( :userId, :title, :categoryName, :mediaUrl, :descriptionInfo, :postdate, :upvote, :downvote)';
    // VALUES ($userId, '$title', '$categoryName', '$mediaUrl', '$description', '$date', 0, 0)';
    $arr = [$userId, $title, $categoryName, $mediaUrl, $description, $date];

    $result = $db->executeQueryBindArr($sql, $arr);
    return $result;
  }
}
