<?php
spl_autoload_register(function ($class) {
    $pathController = '../../controller/' . $class . '.php';
    $pathModel = '../../models/' . $class . '.php';
  
    if(file_exists($pathController)) {
      require_once $pathController;
    } else if (file_exists($pathModel)) {
      require_once $pathModel;
    }
});

$session = new SessionHandle;

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $logout = new LogOut();
    $msg = "You are now logged out.";
    $redirect = new Redirector("../../index.php");
} elseif ($session->logged_in()) {
    $redirect = new Redirector("../../index.php");
}

// php validation after js validation it's okay

if (isset($_POST['submit'])) {

    $username = validate_data($_POST['username']);
    $password = validate_data($_POST['password']);
    $c = new LoginController();
    $msg = $c->loginUser($username, $password);
}
function validate_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <link rel="stylesheet" href="../../web/css/login-signup.css" />
    <link rel="stylesheet" href="../../web/css/messages-styles.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body id="login">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <div id="login-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap extra-margin">
                <?php
                if (!empty($msg)) {
                    echo "<p id=\"info-msg\" class=\"message info-message\">" . $msg . "</p>";
                }
                ?>
                <div class="logo-position"><img id="logo" src="../../web/img/assets/logo.png" alt="monkia logo" /></div>
                <h1>Login</h1>
                <!-- -->
                <form method="post" action="" onsubmit="return validate();">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" maxlength="30" autocomplete="off" required="" aria-required="true" autofocus="autofocus" onfocus="this.select()">
                        <span class="msg error-message my-2" id="username-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" maxlength="30" autocomplete="off" required="" aria-required="true" id="password">
                        <span class="msg error-message my-2" id="password-error"></span>
                    </div>
                    <input type="submit" name="submit" value="Submit" id="submit">
                </form>
                <footer>
                    <p>Don't have an account yet? <a class="purple-color" href="signup.php">Sign up Here</a></p>
                </footer>
            </div>
        </div>
    </div>
    <!-- Login validation -->
    <script type="text/javascript" src="js/login.js"></script>


</body>

</html>