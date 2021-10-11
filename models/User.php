<?php
require_once('DbConn.php');

class User
{
    private $userId;
    private $username;
    private $email;
    private $password;
    public $userCategories = array();
    public $message;

    //We retrieve user data from user table and their preferred categories from user_category table
    public function getUserData($userId)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = 'SELECT user_id, username, email
                    from user where user_id = $userId';
            $stmt = $db->selectQuery($sql);
            if ($stmt) {
                $this->userId = $stmt['user_id'];
                $this->username = $stmt['username'];
                $this->email = $stmt['email'];
            }
            $sql = 'SELECT c.category_name
            from category c 
            inner join user_category uc on c.category_name = uc.category_name  
            where uc.user_id = $userId';

            $stmt = $db->selectQuery($sql);
            if ($stmt) {
                foreach ($stmt as $data)
                    array_push($this->userCategories, $data);
            }
            $result = true;
        }

        return $result;
    }

    public function isUserRegistered($username, $email, $password)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = 'SELECT count(*) from user where username = $username and email = $email and password = $password';
            $result = $db->executeQuery($sql);
        }
        return $result;
    }

    public function isUserRegisteredId($userId)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = 'SELECT count(*) from user where $user_id = $userId';
            $result = $db->executeQuery($sql);
        }
        return $result;
    }

    public function registerUser($username, $email, $password)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {

            $sql = "INSERT INTO `user` (`username`, avatar, `password`, email, `rank`, role_name) 
            VALUES ('{$username}', 'avatar', '{$password}', '{$email}', 'Beginner', 'registeredUser')";

            $result = $db->executeQuery($sql);
            var_dump($result);
        }
        return $result;
    }

    public function updateUser($userId, $email, $username, $password)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = 'UPDATE user 
                    SET username = $username;
                    avatar = $email;
                    password = $username;
                    email = $password; 
                    WHERE user_id = $userId';
            $result = $db->executeQuery($sql);
        }
        return $result;
    }
}
