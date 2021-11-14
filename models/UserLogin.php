<?php
require_once('DbConn.php');
require_once('Redirector.php');
class UserLogin
{

    public $message = array(
        "id" => "",
        "text" => "",
    );
    public function loginUser($username, $password)
    {

        $db = new DbConn();
        $user = trim($username);
        $pass = trim($password);
        $sql = 'SELECT user_id, username, avatar,`password` from user where username = ? LIMIT 1';
        $result = $db->selectQueryBind($sql, $user);
        // User exists
        if (count($result) == 1) {
            if ($result[0]['password'] == $pass) {
                $_SESSION['userId'] = $result[0]['user_id'];
                $_SESSION['username'] = $result[0]['username'];
                $_SESSION['avatar'] = $result[0]['avatar'];
                $redirect = new Redirector("../../index.php");
            } else {
                $this->message["id"] = "general";
                $this->message["text"] = "Username/password combination incorrect. Please make sure your caps lock key is off and try again.";
            }
            // User doesn't exist
        } else {
            $this->message["id"] = "username";
            $this->message["text"] = "No such Username in the database. Please make sure your caps lock key is off and try again.";
        }

        return $this->message;
    }
}
