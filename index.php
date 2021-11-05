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

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="views/web/css/styles.css" />
  <link rel="stylesheet" href="views/web/css/new_post.css" />
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Monkia</title>
</head>

<body>
  <div class="container-fluid d-flex flex-column">
      <?php include_once('views/shared/header.php'); ?>
      <div class="row">
      <!-- Left content -->
      <div class="content_left col col-lg-2 col-xs-12 d-flex">
        <?php include_once('views/shared/left_menu.php'); ?>
      </div>

      <!-- Main content -->
      <div class="col col-lg-8 col-xs-12" id='content'>
        <?php include_once('views/pages/userfeed.php'); ?>
      </div>

      <!-- Content Right | Not implemented yet -->
      <!-- <?php //include_once('view/right_menu.php'); ?> -->
    </div>
  </div> <!-- header view container fluid div-->
</body>

</html>

<script type="text/javascript" src="views/web/js/AJAXdynamic.js"></script>