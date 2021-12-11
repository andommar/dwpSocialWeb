<?php
// require_once ('../../bootstrapping.php');
$a = new AdminController();
if (!(isset($_SESSION['userId']) && $a->isUserAdmin($_SESSION['userId']))){
    $redirect = new Redirector("home");
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
    <title>Dashboard - SB Admin</title>
  </head>
  <body>
      <!-- Header navbar -->
      <?php require_once('shared/admin-header.php') ?>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
      <?php require_once('shared/admin-sidebar.php') ?>


        <!-- Main content -->
        <main class="col-md-10 pt-3 px-4" id="admin-content">
            <?php require_once('pages/admin-home.php') ?>
        </main>
      </div>
    </div>
    <!-- <script src="js/chart-pie.js"></script> -->
  </body>
</html>
