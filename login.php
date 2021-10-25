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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-signup.css" />

</head>

<body id="login">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <div id="login-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap extra-margin">
                <?php
                if (!empty($msg)) {
                    echo "<p class=\"message info-message\">" . $msg . "</p>";
                }
                ?>
                <div class="logo-position"><img id="logo" src="img/assets/logo.png" alt="monkia logo" /></div>
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
    </div>
</body>

</html>