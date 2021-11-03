<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="web/css/styles.css" />
  <link rel="stylesheet" href="web/css/new_post.css" />
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Monkia</title>
</head>

<?php
//Session handler
spl_autoload_register(function ($class) {
  $pathController = 'controller/' . $class . '.php';
  $pathModel = 'models/' . $class . '.php';

  if(file_exists($pathController)) {
    require_once $pathController;
  } else if (file_exists($pathModel)) {
    require_once $pathModel;
  }
});

$session = new SessionHandle();
if ($session->confirm_logged_in()) {
  $redirect = new Redirector("views/home/login.php");
}

$c = new UserController();
$userData = $c->getUserInfo();
?>

<?php include_once('views/shared/header.php'); ?>

<div class="row">
  <!-- Content -->
  <?php include_once('views/shared/left_menu.php'); ?>
  <!-- News FEED -->
  <?php include_once('views/shared/userfeed.php'); ?>
  <!-- Content Right | Not implemented yet -->
  <!-- <?php include_once('view/right_menu.php'); ?> -->
</div>
</div> <!-- header view container fluid div-->
</body>

</html>