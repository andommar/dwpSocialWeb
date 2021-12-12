<?php 
// require_once ('../../bootstrapping.php'); 
$a = new AdminController();
if (!(isset($_SESSION['userId']) && $a->isUserAdmin($_SESSION['userId']))){
    $redirect = new Redirector("../home/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link href="views/admin/css/admin-styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Chart js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Datatables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <title>Dashboard - SB Admin</title>
  </head>
  <body>
  <nav class="navbar navbar-dark d-flex bg-dark p-0">
        <div class="col-md-2">
            <a href="../../index.php" class="navbar-brand">Socially</a>
        </div>
        <div class="admin_navbar_links px-3">
            <div class="admin_navbar_profile d-flex align-items-center" id="user_profile">
                <i class="fas fa-user"></i>
                <span><?php echo $_SESSION['username'] ?></span>
                <a id="logout" href="../home/login.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 d-none d-md-block bg-dark sidebar">
          <div class="sidebar-sticky">
            <div class="sidenav-menu" id="adminSidenav">
              <nav class="d-flex flex-column" id="adminSidenav_bar">
              <div class="sidenav-menu-heading">CORE</div>
                <a class="sidebar_link" href="admin"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a>
                <div class="sidenav-menu-heading">MANAGEMENT</div>
                <a class="sidebar_link" href="admin/posts"><i class="fas fa-comment-dots fa-fw"></i>Posts</a>
                <a class="sidebar_link" href="adminUsersDashboard.php"><i class="fas fa-users fa-fw"></i>Users</a>
                <a class="sidebar_link" href="adminCommentsDashboard.php"><i class="fas fa-comments fa-fw"></i>Comments</a>
                <div class="sidenav-menu-heading">STATS</div>
                <a href="charts.php"><i class="fas fa-tachometer-alt fa-fw"></i>Charts</a>
              </nav>
            </div>
          </div>
        </div>


        <?php 
        $a = new AdminController();

        ?>
        <main class="col-md-10 pt-3 px-4">
          
        </main>
      </div>
    </div>
    <!--<script src="js/chart-doughnut.js"></script> -->
  </body>
  <script src="views/admin/js/data-table.js"></script>

</html>
