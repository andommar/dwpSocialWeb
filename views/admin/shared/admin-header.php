<nav class="navbar navbar-dark bg-dark p-0">
    <div class="col-md-2">
        <a href="home" class="navbar-brand">Socially</a>
    </div>
    <div class="admin_navbar_links px-3">
        <div class="admin_navbar_profile d-flex align-items-center" id="user_profile">
            <i class="fas fa-user"></i>
            <span><?php echo $_SESSION['username'] ?></span>
            <a id="logout" href="logout/1"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
</nav>