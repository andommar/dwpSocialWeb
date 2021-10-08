<?php
require_once('DbConn.php');
class LoginUser{
    
    public $message;
    public function __construct($username, $password)
    {
        $db = new DbConn();
        $user = trim($username);
        $pass = trim($password);
        $sql = "SELECT user_id, username, password from user where username = '{$user}' LIMIT 1";
        $result = $db->selectquery($sql);
        echo count($result);
        var_dump($result);
        if(count($result)== 1){
            echo "Entra";
        }
    }
}

$lu = new LoginUser('monke', 'monke1');

$a = array(1, 2, array("a", "b", "c"));
var_dump($a);

?>