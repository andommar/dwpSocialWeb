<?php
require_once('DbConn.php');
require_once('Redirector.php');
class LoginUser{
    
    public $message;
    public function __construct($username, $password)
    {
        $db = new DbConn();
        $user = trim($username);
        $pass = trim($password);
        $sql = "SELECT user_id, username, `password` from user where username = '{$user}' LIMIT 1";
        $result = $db->selectquery($sql);
        if(count($result)== 1){
           if($result [0]['password'] == $pass) {
               $_SESSION['userId'] = $result[0]['user_id'];
               $_SESSION['username'] = $result[0]['username'];
               $redirect = new Redirector("index.php");
           } else {
               $this->message = "Incorrect Username/password.";
           }
        } else {
            $this->message = "Username doesn't exist.";
        }
    }
}
?>

