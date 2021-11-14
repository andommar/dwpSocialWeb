<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../models/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

class UserController
{
    public $msg;

    public function registerUser($username, $email, $password, $avatar)
    {
        $u = new User($username, $email, $password);
        $res = $u->registerUser($username, $email, $password, $avatar);
        $this->msg = $u->message;
        return $res; // If user is successfully created, returns their user Id
    }

    public function getUserInfo()
    {
        $u = new User($_SESSION['userId']);
        $data = [
            'userId' => $u->getUserId(),
            'username' => $u->getUsername(),
            'avatar' => $u->getUserAvatar(),
            'email' => $u->getUserEmail(),
            'rank' => $u->getUserRank()
        ];
        return $data;
    }
    public function getUserPassword()
    {
        $u = new User($_SESSION['userId']);
        $data = $u->getUserPassword();
        return $data;
    }

    // Instances a user object. Mostly used to set user info
    public function setUser(){
        $u = new User($_SESSION['userId']);
        return $u;
    }
}
