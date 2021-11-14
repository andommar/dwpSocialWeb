<?php
require_once('../../bootstrapping.php');
$session = new SessionHandle;

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $logout = new LogOut();
    $redirect = new Redirector("login.php");
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
    <!-- Web icon -->
    <link rel="icon" href="../web/img/assets/favicon.ico" type="image/x-icon">
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../web/css/login-signup.css" />
    <link rel="stylesheet" href="../web/css/messages-styles.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="login">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <div id="login-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap extra-margin">
                <!-- Standard top popup message -->
                <?php if (!empty($msg["id"]) && !empty($msg["text"]) && $msg["id"] == 'general') { ?>
                    <div class="text-center mb-3 alert alert-danger py-2 alert-dismissible fade show" role="alert">
                        <span class="my-2 " id="general">

                            <?php echo $msg["text"]; ?>

                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="logo-position"><img id="logo" src="../web/img/assets/logo.png" alt="socially logo" /></div>
                <h1>Login</h1>
                <!-- -->
                <form method="post" action="" onsubmit="return validate();">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" autofocus="autofocus" onfocus="this.select()">
                        <span class="msg error-message my-2" id="username-error">
                            <?php if (!empty($msg["id"]) && !empty($msg["text"]) && $msg["id"] == 'username') {
                                echo $msg["text"];
                            } ?>
                        </span>
                    </div>
                    <div class="form-group" id="password-parent">
                        <label for="password">Password</label>
                        <i id="password-show" class="fas fa-eye-slash"></i>
                        <input type="password" name="password" maxlength="30" autocomplete="off" id="password">
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
    <!-- Validation -->
    <script type="text/javascript" src="../web/js/utils.js"></script>
    <script type="text/javascript" src="../web/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>