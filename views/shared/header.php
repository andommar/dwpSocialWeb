<body>
  <div class="container-fluid d-flex flex-column">
    <div class="row navbar d-flex align-items-center h-auto sticky-top">
      <div class="col col-6 navbar_left d-flex align-items-center flex-fill my-2">
        <div>
          <a href="./index.php"><img class="navbar_logo" src="./web/img/assets/logo_low.png" alt="avatar" /></a>
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
          <img src="./web/img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" />
          <span><?php echo $userData['username'] ?></span>
        </div>
        <div class="navbar_links">
          <a href="./views/shared/new_post.php"><i class="fa fa-plus"></i></a>
          <i class="fas fa-comment-dots"></i>
          <!-- <i class="fa fa-bell"></i> -->
          <a href="./views/home/login.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
        </div>


      </div>
    </div>