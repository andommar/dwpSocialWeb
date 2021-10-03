<?php

require_once('DbConn.php');

class Post {


  public function load_posts(){
    $db = new Dbconn();
    $sql = 'SELECT u.user_id,u.username,u.avatar,u.rank, p.* FROM user u inner join post p where u.user_id = p.user_id';
    $result = $db->selectquery($sql);
    return $result;

  }
}


?>