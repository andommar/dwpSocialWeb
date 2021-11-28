<?php
require_once ('../../bootstrapping.php');
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
    <link href="css/admin-styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard - SB Admin</title>
  </head>
  <body>
      <!-- Top navbar -->
    <nav class="navbar navbar-dark sticky-top bg-dark p-0">
      <a href="../../index.php" class="navbar-brand">Socially</a>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 d-none d-md-block bg-dark sidebar">
          <div class="sidebar-sticky">
            <div class="sidenav-menu" id="adminSidenav">
              <nav class="d-flex flex-column" id="adminSidenav_bar">
                <div class="sidenav-menu-heading">CORE</div>
                <a href="admin.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <div class="sidenav-menu-heading">MANAGEMENT</div>
                <a href="posts.php"><i class="fas fa-comment-dots"></i>Posts</a>
                <a href="users.php"><i class="fas fa-users"></i>Users</a>
                <a href="comments.php"><i class="fas fa-comments"></i>Comments</a>
                <div class="sidenav-menu-heading">STATS</div>
                <a href="charts.php"><i class="fas fa-tachometer-alt"></i>Charts</a>
              </nav>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <main class="col-md-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap align-items-center">
            <h1>Admin Dashboard</h1>
          </div>
          <!-- Total stats section -->
          <div class="row">
            <div class="my-3">
                <section id="totalStats">
                    <h4 class="text-muted">Stats</h4>
                    <div class="d-flex justify-content-around">
                        <div class="col-sm-2">
                            <div class="card border-left border-primary shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs weight-bold text-uppercase">
                                                Users
                                            </div>
                                            <div class="font-weight-bold text-uppercase">
                                                <h5>53630</h5>
                                            </div>
                                            <!-- <h5 class="card-title">Users</h5>
                                            <p class="card-text">41233</p> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-left border-primary shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs weight-bold text-uppercase">
                                                Posts
                                            </div>
                                            <div class="font-weight-bold text-uppercase">
                                                <h5>53630</h5>
                                            </div>
                                            <!-- <h5 class="card-title">Users</h5>
                                            <p class="card-text">41233</p> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-paragraph fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-left border-primary shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs weight-bold text-uppercase">
                                                Comments
                                            </div>
                                            <div class="font-weight-bold text-uppercase">
                                                <h5>53630</h5>
                                            </div>
                                            <!-- <h5 class="card-title">Users</h5>
                                            <p class="card-text">41233</p> -->
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-left border-primary shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs weight-bold text-uppercase">
                                                Upvotes
                                            </div>
                                            <div class="font-weight-bold text-uppercase">
                                                <h5>53630</h5>
                                            </div>
                                            <!-- <h5 class="card-title">Users</h5>
                                            <p class="card-text">41233</p> -->
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-arrow-up fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card border-left border-primary shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs weight-bold text-uppercase">
                                                Downvotes
                                            </div>
                                            <div class="font-weight-bold text-uppercase">
                                                <h5>53630</h5>
                                            </div>
                                            <!-- <h5 class="card-title">Users</h5>
                                            <p class="card-text">41233</p> -->
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-arrow-down fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
          </div>
          <!-- Graphs section -->
          <div class="row">
              <div class="my-3">
                <section id="graphs">
                    <h4 class="text-muted">Graphs</h4>
                    <div class="d-flex justify-content-around">
                        <div class="col-md-7">
                            <div class="card mb-4 shadow">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Line Chart Example
                                </div>
                                <div class="card-body"><canvas id="myLineChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 shadow">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Line Chart Example
                                </div>
                                <div class="card-body"><canvas id="myDoughnutChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>
            </div>
            <!-- Tables section  -->
            <!-- <div class="row">
            <div class="pt-3 px-4">
              <section id="newUsers">
                <h4 class="text-muted">Graphs</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                        </tr>
                        <tr>
                        <td>1,002</td>
                        <td>amet</td>
                        <td>consectetur</td>
                        <td>adipiscing</td>
                        <td>elit</td>
                        </tr>
                        <tr>
                        <td>1,003</td>
                        <td>Integer</td>
                        <td>nec</td>
                        <td>odio</td>
                        <td>Praesent</td>
                        </tr>
                        <tr>
                        <td>1,003</td>
                        <td>libero</td>
                        <td>Sed</td>
                        <td>cursus</td>
                        <td>ante</td>
                        </tr>
                        <tr>
                        <td>1,004</td>
                        <td>dapibus</td>
                        <td>diam</td>
                        <td>Sed</td>
                        <td>nisi</td>
                        </tr>
                        <tr>
                        <td>1,005</td>
                        <td>Nulla</td>
                        <td>quis</td>
                        <td>sem</td>
                        <td>at</td>
                        </tr>
                        <tr>
                        <td>1,006</td>
                        <td>nibh</td>
                        <td>elementum</td>
                        <td>imperdiet</td>
                        <td>Duis</td>
                        </tr>
                        <tr>
                        <td>1,007</td>
                        <td>sagittis</td>
                        <td>ipsum</td>
                        <td>Praesent</td>
                        <td>mauris</td>
                        </tr>
                        <tr>
                        <td>1,008</td>
                        <td>Fusce</td>
                        <td>nec</td>
                        <td>tellus</td>
                        <td>sed</td>
                        </tr>
                        <tr>
                        <td>1,009</td>
                        <td>augue</td>
                        <td>semper</td>
                        <td>porta</td>
                        <td>Mauris</td>
                        </tr>
                        <tr>
                        <td>1,010</td>
                        <td>massa</td>
                        <td>Vestibulum</td>
                        <td>lacinia</td>
                        <td>arcu</td>
                        </tr>
                        <tr>
                        <td>1,011</td>
                        <td>eget</td>
                        <td>nulla</td>
                        <td>Class</td>
                        <td>aptent</td>
                        </tr>
                        <tr>
                        <td>1,012</td>
                        <td>taciti</td>
                        <td>sociosqu</td>
                        <td>ad</td>
                        <td>litora</td>
                        </tr>
                        <tr>
                        <td>1,013</td>
                        <td>torquent</td>
                        <td>per</td>
                        <td>conubia</td>
                        <td>nostra</td>
                        </tr>
                        <tr>
                        <td>1,014</td>
                        <td>per</td>
                        <td>inceptos</td>
                        <td>himenaeos</td>
                        <td>Curabitur</td>
                        </tr>
                        <tr>
                        <td>1,015</td>
                        <td>sodales</td>
                        <td>ligula</td>
                        <td>in</td>
                        <td>libero</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
              </section>
            </div>
          </div> -->
        </main>
      </div>
    </div>
    <script src="js/chart-line.js"></script>
    <script src="js/chart-doughnut.js"></script>
  </body>
</html>
