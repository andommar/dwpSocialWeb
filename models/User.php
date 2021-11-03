<?php
require_once('db/DbConn.php');

class User
{
    private $userId;
    private $username;
    private $email;
    private $avatar;
    private $password;
    public $userCategories = array();
    public $message;

    //We retrieve user data from user table and their preferred categories from user_category table
    public function __construct($userId)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = "SELECT `user_id`, username, email, avatar
                    from user where `user_id` = $userId";
            $stmt = $db->selectQuery($sql);
            if ($stmt) {
                foreach ($stmt as $values) {
                    $this->userId = $values['user_id'];
                    $this->username = $values['username'];
                    $this->email = $values['email'];
                    $this->avatar = $values['avatar'];
                }
            }
            $sql = "SELECT c.category_name
            from category c 
            inner join user_category uc on c.category_name = uc.category_name  
            where uc.user_id = $userId";
            $stmt = $db->selectQuery($sql);
            if ($stmt) {
                foreach ($stmt as $data)
                    array_push($this->userCategories, $data);
            }
            $result = true;
        }

        return $result;
    }

    // Getters
    public function getUsername()
    {
        return $this->username;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserCategories()
    {
        return $this->userCategories;
    }

    public function getUserAvatar()
    {
        return $this->avatar;
    }

    public function getUserEmail()
    {
        return $this->email;
    }


    // Methods

    public function isUserRegistered($username, $email, $password)
    {
        $db = new Dbconn();
        $result = false;
        $arr = [$username, $email, $password];
        if ($db->isConnected()) {
            $sql = 'SELECT count(*) from user where username = ? and email = ? and password = ?';
            $result = $db->executeQueryBindArr($sql,$arr);
        }
        return $result;
    }

    public function isUserRegisteredId($userId)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {
            $sql = 'SELECT count(*) from user where $user_id = ?';
            $result = $db->executeQuery($sql,$userId);
        }
        return $result;
    }

    public function registerUser($username, $email, $password)
    {
        $db = new Dbconn();
        $result = false;
        if ($db->isConnected()) {

            $sql = 'INSERT INTO `user` (`username`, avatar, `password`, email, `rank`, role_name) 
                    VALUES (?, ?, ?, ?, ?, ?)';
            $arr = [$username, 'avatar', $password, $email, 'Beginner', 'registeredUser'];
            // VALUES ('{$username}', 'avatar', '{$password}', '{$email}', 'Beginner', 'registeredUser')";
            $result = $db->executeQueryBindArr($sql, $arr);
        }
        return $result;
    }

    //Not implemented yet. Missing binded parameters array
    public function updateUser($userId, $email, $username, $password)
    {
        $db = new Dbconn();
        $result = false;
        $arr = [$userId, $email, $username, $password];
        if ($db->isConnected()) {
            $sql = 'UPDATE user 
                    SET username = ?,
                    avatar = ?,
                    password = ?,
                    email = ?,
                    WHERE user_id = ?';
            $result = $db->executeQueryBindArr($sql, $arr);
        }
        return $result;
    }
}
