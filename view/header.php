<?php
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
  $redirect = new Redirector("login.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/new_post.css" />
  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Monkia</title>
</head>

<body>
  <div class="container-fluid d-flex flex-column">
    <div class="row navbar d-flex align-items-center h-auto sticky-top">
      <div class="col col-6 navbar_left d-flex align-items-center flex-fill my-2">
        <div>
          <a href="index.php"><img class="navbar_logo" src="img/assets/logo_low.png" alt="avatar" /></a>
        </div>
        <div class="input-icons">
          <form class="d-flex">
            <input class="form-control me-2 input-field" type="search" placeholder="Type something" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search </button>
          </form>
        </div>
      </div>
      <!-- <div class="col col-xl-6 col-md-4 col-xs-4 navbar_center d-flex">
        <a href="#" class="active_icon">
          <i class="fas fa-home"></i>
        </a>
        <a href="#">
          <i class="fas fa-user-friends"></i>
        </a>
        <a href="#">
          <i class="fas fa-infinity"></i>
        </a>
        <a href="#">
          <i class="fas fa-bookmark"></i>
        </a>
        <a href="#">
          <i class="fas fa-info-circle"></i>
        </a>
      </div> -->

      <div class="col col-6 navbar_right d-flex align-items-center flex-fill my-2">

        <div class="navbar_profile d-flex align-items-center">
          <img src="img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" />
          <span><?php echo $userData['username'] ?></span>
        </div>
        <div class="navbar_links">
          <a href="new_post.php"><i class="fa fa-plus"></i></a>
          <i class="fas fa-comment-dots"></i>
          <!-- <i class="fa fa-bell"></i> -->
          <a href="login.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
        </div>


      </div>
    </div>