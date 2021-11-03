<?php
require_once('DbConn.php');
require_once('Redirector.php');
class UserLogin
{

    public $message;

    public function loginUser($username, $password)
    {

        $db = new DbConn();
        $user = trim($username);
        $pass = trim($password);
        $sql = 'SELECT user_id, username, `password` from user where username = ? LIMIT 1';
        $result = $db->selectSingleQueryBind($sql, $user);
        if (count($result) == 1) {
            if ($result[0]['password'] == $pass) {
                $_SESSION['userId'] = $result[0]['user_id'];
                $_SESSION['username'] = $result[0]['username'];
                $redirect = new Redirector("../../index.php");
            } else {
                $this->message = "Username/password combination incorrect.<br />
                Please make sure your caps lock key is off and try again.";
            }
        } else {
            $this->message = "No such Username in the database.<br />
            Please make sure your caps lock key is off and try again.";
        }

        return $this->message;
    }
}
