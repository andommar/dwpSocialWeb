<?php
spl_autoload_register(function ($class) {
    include "models/" . $class . ".php";
});
$session = new SessionHandle;

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $logout = new LogOut();
    $msg = "You are now logged out.";
    $redirect = new Redirector("index.php");
} elseif ($session->logged_in()) {
    $redirect = new Redirector("index.php");
}

if (isset($_POST['submit'])) {
    $login = new LoginUser($_POST['username'], $_POST['password']);
    $msg = $login->message;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login-signup.css" />
</head>

<body>
    <div id="container">
        <div id="login-form" class="form-wrap extra-margin">
            <?php
            if (!empty($msg)) {
                echo "<p class=\"message info-message\">" . $msg . "</p>";
            }
            ?>
            <h1>Login</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required="" aria-required="true" autofocus="autofocus" onfocus="this.select()">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" autocomplete="off" required="" aria-required="true" id="password">
                </div>
                <input type="submit" name="submit" value="Submit">
            </form>
            <footer>
                <p>Don't have an account yet? <a class="purple-color" href="signup.php">Sign up Here</a></p>
            </footer>
        </div>
    </div>
</body>

</html>