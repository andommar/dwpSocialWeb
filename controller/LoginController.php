<?php
spl_autoload_register(function ($class) {
    include "models/" . $class . ".php";
});


class LoginController
{
    public function loginUser($username, $password)
    {
        $u = new UserLogin();
        $res = $u->loginUser($username, $password);
        return $res;
    }
}
