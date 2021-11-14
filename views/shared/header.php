    <div class="row navbar d-flex align-items-center h-auto sticky-top">
      <div class="col col-6 navbar_left d-flex align-items-center flex-fill my-2">
        <div>
          <a href="index.php"><img class="navbar_logo" src="views/web/img/assets/logo_low.png" alt="avatar" /></a>
        </div>
        <div class="input-icons">
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
          <img src="./views/web/img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" id="user_profile"/>
          <span><?php echo $userData['username'] ?></span>
        </div>
        <div class="navbar_links">
          <i class="fa fa-plus" id="new_post"></i>
          <i class="fas fa-comment-dots" style="cursor: initial;"></i>
          <!-- <i class="fa fa-bell"></i> -->
          <a href="./views/home/login.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
        </div>


      </div>
    </div>