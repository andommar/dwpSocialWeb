<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../models/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

class UserController
{
    public $msg = array(
        "id" => "",
        "text" => "",
    );

    public function registerUser($username, $email, $password, $avatar)
    {
        $u = new UserModel($username, $email, $password);
        $res = $u->registerUser($username, $email, $password, $avatar);
        $this->msg = $u->message;
        return $res; // If user is successfully created, returns their user Id
    }

    public function getUserInfo()
    {
        $u = new UserModel($_SESSION['userId']);
        $data = [
            'userId' => $u->getUserId(),
            'username' => $u->getUsername(),
            'avatar' => $u->getUserAvatar(),
            'email' => $u->getUserEmail(),
            'rank' => $u->getUserRank()        ];
        return $data;
    }

    public function getUserData($userId)
    {
        $u = new UserModel($userId);
        $data = [
            'userId' => $u->getUserId(),
            'username' => $u->getUsername(),
            'avatar' => $u->getUserAvatar(),
            'email' => $u->getUserEmail(),
            'rank' => $u->getUserRank(),
            'role' => $u->getUserRole()
        ];
        return $data;
    }
    
    public function getUserPassword()
    {
        $u = new UserModel($_SESSION['userId']);
        $data = $u->getUserPassword();
        return $data;
    }

    // Instances a user object. Mostly used to set user info
    public function setUser()
    {
        $u = new UserModel($_SESSION['userId']);
        return $u;
    }

    // Validation
    function validateSignUpFields($username, $email, $password, $password2)
    {
        $isDataValid = false;
        // Variables sanitizing
        $username = htmlspecialchars(trim($username));
        $username = str_replace(' ', '', $username);

        $email = htmlspecialchars(trim($email));
        $email = str_replace(' ', '', $email);

        $password = htmlspecialchars(trim($password));
        $password = str_replace(' ', '', $password);

        $password2 = htmlspecialchars(trim($password2));
        $password2 = str_replace(' ', '', $password2);

        // Regex
        $username_regexp = "/^[0-9A-Za-z\_]+$/";
        $email_regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";
        $password_regexp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,30}$/";


        // USERNAME
        if (empty($username)) {
            $this->msg["id"] = "username";
            $this->msg["text"] = "Username cannot be empty.";
        }
        // Username length
        else if (strlen($username) < 4) {
            $this->msg["id"] = "username";
            $this->msg["text"] = "Username must have at least 4 characters.";
        } else if (strlen($username) > 30) {
            $this->msg["id"] = "username";
            $this->msg["text"] = "Username cannot exceed 30 characters.";
        }
        // Username is not the accepted type
        else if (!preg_match($username_regexp, $username)) {
            $this->msg["id"] = "username";
            $this->msg["text"] = "Username can only contain letters, numbers and underscores.";
        }
        // EMAIL
        else if (empty($email)) {
            $this->msg["id"] = "email";
            $this->msg["text"] = "Email cannot be empty.";
        }
        // Email is not the accepted type
        else if (!preg_match($email_regexp, $email)) {
            $this->msg["id"] = "email";
            $this->msg["text"] = "This email is not valid.";
        }
        // PASSWORD
        else if (empty($password)) {
            $this->msg["id"] = "password";
            $this->msg["text"] = "Password cannot be empty.";
        }
        // Password length
        else if (strlen($password) < 6) {
            $this->msg["id"] = "password";
            $this->msg["text"] = "Password must have at least 6 characters.";
        } else if (strlen($password) > 30) {
            $this->msg["id"] = "password";
            $this->msg["text"] = "Password cannot exceed 30 characters.";
        }
        // Password is not the accepted type
        else if (!preg_match($password_regexp, $password)) {
            $this->msg["id"] = "password";
            $this->msg["text"] = "Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.";
        }
        // PASSWORD 2
        else if (empty($password2)) {
            $this->msg["id"] = "password2";
            $this->msg["text"] = "Password cannot be empty.";
        }
        // PASSWORD VS PASSWORD  2
        // Passwords have different values
        else if (!($password === $password2)) {
            $this->msg["id"] = "password2";
            $this->msg["text"] = "Passwords must be identical.";
        } else {
            $isDataValid = true;
        }
        return $isDataValid;
    }
}
