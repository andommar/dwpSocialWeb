<?php require_once ('../../bootstrapping.php'); 
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
        $data = $a->getUsersData();

        if((isset($_GET['delete'])) || (isset($_GET['ban']))){
            // Check delete request is done by an admin user
            if($a->isUserAdmin($_SESSION['userId'])){
                if(isset($_GET['delete'])){
                    $a->deleteUser($_GET['delete']);
                    echo 'User deleted successfully';
                } else {
                    $a->banUser($_GET['ban'], $_GET['banned']);
                    echo 'User banned successfully';
                }
            }
        }
        ?>
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
            <!-- Tables section  -->
            <div class="row">
                <div class="my-3">
                    <section id="newUsers">
                        <h4 class="text-muted">Users</h4>
                        <table id="display_table" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="th-sm">Id</th>
                                <th class="th-sm">Username</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Rank</th>
                                <th class="th-sm">Permission</th>
                                <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $user) {
                                echo '<tr>';
                                echo '<td> '.$user['user_id'].'</td>';
                                echo '<td> '.$user['username'].'</td>';
                                echo '<td> '.$user['email'].'</td>';
                                echo '<td> '.$user['rank'].'</td>';
                                echo '<td> '.$user['role_name'].'</td>';
                                echo '<td>';
                                echo '<a href="adminEditUser.php?edit='.$user['user_id'].'" class="add"><i class="fas fa-pen"></i></a>';

                                echo '<a href="adminUsersDashboard.php?delete='.$user['user_id'].'" class="delete" 
                                    onclick="return confirm(\'Are you sure you want to delete this user and their posts/comments?\');"><i class="fas fa-trash"></i></a>';
                                    
                                echo '<a href="adminUsersDashboard.php?ban='.$user['user_id'].'&banned='.$user['banned'].'"
                                    onclick="return confirm(\'Are you sure you want to ban/unban this user?\');class="ban">';
                                        if ($user['banned']){
                                            echo '<i class="fas fa-check"></i>';
                                        } else {
                                            echo '<i class="fas fa-ban"></i>';
                                        }
                                echo '</a>';
                                echo '</td>';
                                echo '</tr>';
                                } ?>
                                <!-- <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2012/03/29</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                                <td>2008/11/28</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>2012/12/02</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                                <td>2012/08/06</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                                <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>55</td>
                                <td>2010/10/14</td>
                                <td>
                                    <a href="#" class="add"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <!-- <div class="table-responsive">
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
                                </tbody>
                            </table>
                        </div> -->
                    </section>
                </div>
          </div>
        </main>
      </div>
    </div>
    <script src="js/data-table.js"></script>
    <!--<script src="js/chart-doughnut.js"></script> -->
  </body>
</html>
