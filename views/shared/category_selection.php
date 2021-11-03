<?php

spl_autoload_register(function ($class) {
    $pathController = '../../controller/' . $class . '.php';
    $pathModel = '../../models/' . $class . '.php';

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
    $redirect = new Redirector("login.php");
} elseif ($session->logged_in()) {
    $redirect = new Redirector("../../index.php");
}

// php validation after js validation it's okay

// if (isset($_POST['submit'])) {

$c = new CategoryController();
$categories = $c->loadCategories();
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
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../web/css/login-signup.css" />
    <link rel="stylesheet" href="../web/css/category_selection.css" />
    <link rel="stylesheet" href="../web/css/messages-styles.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="category-selection">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <div id="category-selection-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap extra-margin">
                <h3 class="text-center">Choose the categories that you are interested in</h3>
                <!-- -->
                <form method="post" action="" onsubmit="return validate();">
                    <div class="form-group d-flex flex-wrap justify-content-between">
                        <?php foreach ($categories as $category) { ?>

                            <button type=" button" id="<?php echo $category['category_name'] ?>" class="category btn btn-primary-deselected btn-style d-flex">
                                <?php if ($category['category_name'] == 'Sports') : ?>
                                    <i class="fas fa-running my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Videos') : ?>
                                    <i class="fas fa-video my-auto"></i>
                                <?php elseif ($category['category_name'] == 'News') : ?>
                                    <i class="fas fa-newspaper my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Music') : ?>
                                    <i class="fas fa-music my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Photography') : ?>
                                    <i class="fas fa-photo-video my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Films') : ?>
                                    <i class="fas fa-film my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Animals') : ?>
                                    <i class="fas fa-paw my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Art') : ?>
                                    <i class="fas fa-palette my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Books') : ?>
                                    <i class="fas fa-book-open my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Finance') : ?>
                                    <i class="fas fa-landmark my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Fitness') : ?>
                                    <i class="fas fa-dumbbell my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Food') : ?>
                                    <i class="fas fa-hamburger my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Health') : ?>
                                    <i class="fas fa-heartbeat my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Gaming') : ?>
                                    <i class="fas fa-gamepad my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Humor') : ?>
                                    <i class="fas fa-grin-squint my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Science') : ?>
                                    <i class="fas fa-flask my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Shows') : ?>
                                    <i class="fab fa-youtube my-auto"></i>
                                <?php elseif ($category['category_name'] == 'Tech') : ?>
                                    <i class="fas fa-mobile-alt my-auto"></i>
                                <?php endif; ?>
                                <?php echo $category['category_name'] ?>

                            </button>

                            <!-- <button type="button" id="1" class="btn btn-primary-deselected btn-spacing">Primary</button>
                        <button type="button" id="12" class="btn btn-secondary-deselected btn-spacing">Dark</button>-->
                        <?php }; ?>
                    </div>
                    <h6 class="text-center mt-3">Please, pick at least <u>two</u></h6>

                    <input type="submit" name="submit" value="Next" id="submit">
                </form>

            </div>
        </div>
    </div>
    <!-- Validation -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="../web/js/category_selection.js"></script>
</body>

</html>