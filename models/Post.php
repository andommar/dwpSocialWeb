<?php

require_once('DbConn.php');

class Post {


  //It's missing userid parameter
  public function loadUserFeedPosts(){
    $db = new Dbconn();
    $sql = 'SELECT u.user_id,u.username,u.avatar,u.rank, p.* FROM user u inner join post p where u.user_id = p.user_id';
    $result = $db->selectquery($sql);
    return $result;

  }

  public function loadCategoryPosts($categoryName){
    $db = new Dbconn();
    $sql = 'SELECT * FROM post where category_name = $categoryName';
    $result = $db->selectquery($sql);
    return $result;
  }

  public function newPost($userId, $title, $categoryName, $mediaUrl, $description){
    $db = new DbConn();
    $sql = 'INSERT INTO post (user_id, title, category_name, media_url, description) VALUES ($userId, $title, $categoryName, $mediaUrl, $description)';
    $result = $db->executeQuery($sql);
    return $result;
  }
}


?>