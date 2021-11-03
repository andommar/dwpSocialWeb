<?php

spl_autoload_register(function ($class) {
    $pathController = '../controller/' . $class . '.php';
    $pathModel = '../models/' . $class . '.php';

    if (file_exists($pathController)) {
        require_once $pathController;
    } else if (file_exists($pathModel)) {
        require_once $pathModel;
    }
});

$session = new SessionHandle;

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $logout = new LogOut();
    $msg = "You are now logged out.";
    $redirect = new Redirector("index.php");
} elseif ($session->logged_in()) {
    $redirect = new Redirector("index.php");
}

// php validation after js validation it's okay

// if (isset($_POST['submit'])) {

//     $username = validate_data($_POST['username']);
//     $password = validate_data($_POST['password']);
//     $c = new LoginController();
//     $msg = $c->loginUser($username, $password);
// }
// function validate_data($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = strip_tags($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Category selection</title>
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/login-signup.css" />
    <link rel="stylesheet" href="../css/category_selection.css" />
    <link rel="stylesheet" href="../css/messages-styles.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="category-selection">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <div id="category-selection-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap extra-margin">
                <h2>Choose at least one category</h2>
                <!-- -->
                <form method="post" action="" onsubmit="return validate();">
                    <div class="form-group">

                        <button type="button" id="1" class="btn btn-primary-deselected btn-spacing">Primary</button>
                        <button type="button" id="2" class="btn btn-success-deselected btn-spacing">Success</button>
                        <button type="button" id="3" class="btn btn-danger-deselected btn-spacing">Danger</button>
                        <button type="button" id="4" class="btn btn-warning-deselected btn-spacing">Warning</button>
                        <button type="button" id="5" class="btn btn-info-deselected btn-spacing">Info</button>
                        <button type="button" id="6" class="btn btn-secondary-deselected btn-spacing">Dark</button>

                        <!-- <button type="button" id="7" class="btn btn-primary-deselected btn-spacing">Primary</button> -->
                        <button type="button" id="8" class="btn btn-success-deselected btn-spacing">Success</button>
                        <button type="button" id="9" class="btn btn-danger-deselected btn-spacing">Danger</button>
                        <button type="button" id="10" class="btn btn-warning-deselected btn-spacing">Warning</button>
                        <button type="button" id="11" class="btn btn-info-deselected btn-spacing">Info</button>
                        <button type="button" id="12" class="btn btn-secondary-deselected btn-spacing">Dark</button>

                    </div>
                    <input type="submit" name="submit" value="Choose" id="submit">
                </form>

            </div>
        </div>
    </div>
    <!-- Validation -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../js/category_selection.js"></script>
</body>

</html>