<?php

require_once('DbConn.php');

class Post {


  public function load_posts(){
    $db = new Dbconn();
    $sql = 'SELECT * FROM post';
    $result = $db->selectquery($sql);
    return $result;

  }
}


?>