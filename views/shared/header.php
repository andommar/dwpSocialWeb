<div class="row navbar d-flex align-items-center h-auto sticky-top">
  <div class="col col-6 navbar_left d-flex align-items-center flex-fill my-2">
    <div>
      <a id="logo-link"><img class="navbar_logo" src="views/web/img/assets/logo_low.png" alt="avatar" /></a>
    </div>

    <!-- Dropdown menu -->
    <div id="header-dropdown" class="dropdown mx-3">
      <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bars"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a id="all-cats" class="dropdown-item" href="#">All categories</a></li>
        <li><a id="popular-feed" class="dropdown-item" href="#">Popular feed</a></li>
        <li><a id="about-us" class="dropdown-item" href="#">About us</a></li>
      </ul>
    </div>
    <div id="search-bar">
      <form class="d-flex">
        <input class="form-control me-2 input-field" type="search" placeholder="Type something" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search </button>
      </form>
    </div>
  </div>

  <div class="col col-6 navbar_right d-flex align-items-center flex-fill my-2">
    <!-- Scroll to top button -->
    <div class="d-flex align-items-center" id="scrollTop">
      <i class="fas fa-arrow-up" data-toggle="tooltip" data-placement="bottom" title="Scroll to Top"></i>
    </div>
    <div class="navbar_profile d-flex align-items-center" id="user_profile">
      <img src="./views/web/img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" id="user_profile" />
      <span><?php echo $userData['username'] ?></span>
    </div>
    <div class="navbar_links">
      <i class="fa fa-plus" id="new_post" data-toggle="tooltip" data-placement="bottom" title="New Post"></i>
      <a id="logout" href="./views/home/login.php?logout=1"><i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="bottom" title="Logout"></i></a>
    </div>


  </div>
</div>