<?php
spl_autoload_register(function ($class) {
    include "models/" . $class . ".php";
});

class UserController
{

    public function registerUser($username, $email, $password)
    {
        $u = new User($username, $email, $password);
        $res = $u->registerUser($username, $email, $password);
        return $res;
    }

    public function isUserRegistered($username, $email, $password)
    {
        $u = new User($_SESSION['userId']);
        $res = $u->isUserRegistered($username, $email, $password);
        return $res;
    }

    public function getUserInfo()
    {
        $u = new User($_SESSION['userId']);
        $data = [
            'username' => $u->getUsername(),
            'avatar' => $u->getUserAvatar(),
            'email' => $u->getUserEmail()
        ];
        return $data;
    }
}
