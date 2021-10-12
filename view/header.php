<?php
include_once('controller/Controller.php');
include_once('models/SessionHandle.php');
include_once('models/Redirector.php');
$session = new SessionHandle();
if ($session->confirm_logged_in()) {
    $redirect = new Redirector("login.php");
}

$c = new Controller();
$userData = $c->getUserInfo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/post.css" />
  <title>DwpUnknown</title>
</head>

<body>
  <div class="navbar">
    <div class="navbar_left">
      <a href="index.php"><img class="navbar_logo" src="img/assets/logo.png" alt="avatar" /></a>
      <div class="input-icons">
        <i class="fas fa-search icon"></i>
        <input type="text" class="input-field" name="srch_input" placeholder="Search" />
      </div>
    </div>
    <div class="navbar_center">
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
    </div>

    <div class="navbar_right">
      <div class="navbar_profile">
        <img src="img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" />
        <span><?php echo $userData['username'] ?></span>
      </div>
      <div class="navbar_links">
        <a href="submit.php"><i class="fa fa-plus"></i></a>
        <i class="fas fa-comment-dots"></i>
        <!-- <i class="fa fa-bell"></i> -->
        <a href="login.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </div>
  </div>