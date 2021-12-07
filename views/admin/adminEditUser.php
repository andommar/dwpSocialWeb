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
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Chart js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Datatables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <title>Dashboard - SB Admin</title>
  </head>
  <body>
      <!-- Top navbar -->
    <nav class="navbar navbar-dark bg-dark p-0">
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
                <a class="sidebar_link" href="adminDashboard.php"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a>
                <div class="sidenav-menu-heading">MANAGEMENT</div>
                <a class="sidebar_link" href="adminPostsDashboard.php"><i class="fas fa-comment-dots fa-fw"></i>Posts</a>
                <a class="sidebar_link" href="adminUsersDashboard.php"><i class="fas fa-users fa-fw"></i>Users</a>
                <a class="sidebar_link" href="adminCommentsDashboard.php"><i class="fas fa-comments fa-fw"></i>Comments</a>
                <div class="sidenav-menu-heading">STATS</div>
                <a href="charts.php"><i class="fas fa-tachometer-alt fa-fw"></i>Charts</a>
              </nav>
            </div>
          </div>
        </div>

        <!-- Main content -->

        <?php 
        if (isset($_GET['edit'])){
            $userId = $_GET['edit'];
        }
        $a = new UserController(); 
        $data = $a->getUserData($userId)
        ?>
        <main class="col-md-6 pt-3 px-4">
          <!-- Edit user section -->
          <div class="row">
            
                <section id="user-profile">
                    <div class="user-profile-wrapper">
                        <h4 class="pb-2 border-bottom">User account</h4>
                        <div class="d-flex align-items-start py-3 border-bottom">
                            <div class="col-md-6 d-flex px-2 user-profile-info" id="user-info-section"> 
                                <div class="col-md-4">
                                    <img src="../web/img/avatars/<?php echo $data['avatar'] ?>" class="img" alt="">
                                </div>
                                <div class="col-md-6 d-flex-column px-2 align-self-center">
                                    <div class="d-flex user-title-info">
                                        <p><b><?php echo $data['username'] ?></b></p>
                                        <span class="role-badge"><?php echo $data['role'] ?></span>                                    </div>
                                        <span class="user-rank"><?php echo $data['rank'] ?></span>
                                        <span class="secondary-text"><?php echo $data['email'] ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex-column px-2" id="user-comments-section">
                                <h5>User statistics</h5> 
                                <p><b>Total comments:&nbsp;</b><span class="number-user-posts">3</span></p> 
                                <p><b>Total posts:&nbsp;</b><span class="number-user-posts">3</span></p>
                            </div>
                        </div>

                        <!-- Edit user info  -->
                        <div class="py-2">
                            <h4>Edit user</h4>
                            <form action="" method="post" id="adminEditUserForm">
                                <div class="row py-2">
                                    <div class="col-md-6"> 
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="admin-edit-user-username" class="bg-light form-control" placeholder="<?php echo $data['username'] ?>"> 
                                        <span class="msg error-message my-2" id="username-error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email Address</label> 
                                        <input type="email" name="email" id="admin-edit-user-email" class="bg-light form-control" placeholder="<?php echo $data['email'] ?>">
                                        <span class="msg error-message my-2" id="email-error"></span>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-6"> 
                                        <label for="password">Password</label> 
                                        <input type="password" class="bg-light form-control" placeholder="••••••" id="admin-edit-user-password"> 
                                        <span class="msg error-message my-2" id="password-error">
                                    </div>
                                </div>
                                <div class="row py-1 user-role-options">
                                    <div class="col-md-12 py-2">
                                        <h6><label for="rank">User Rank</label> </h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user-rank-input" type="radio" name="userRank" id="beginnerRank" value="Beginner" <?php if($data['rank'] == 'Beginner')  echo 'checked' ?>>
                                            <label class="form-check-label" for="beginner">Beginner</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user-rank-input" type="radio" name="userRank" id="experiencedRank" value="Experienced" <?php if($data['rank'] == 'Experienced') echo 'checked' ?>>
                                            <label class="form-check-label" for="experienced">Experienced</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user-rank-input" type="radio" name="userRank" id="veterandRank" value="Veteran" <?php if($data['rank'] == 'Veteran') echo 'checked' ?>>
                                            <label class="form-check-label" for="veteran">Veteran</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input user-rank-input" type="radio" name="userRank" id="administrationdRank" value="Administration" <?php if($data['rank'] == 'Administration') echo 'checked' ?>>
                                            <label class="form-check-label" for="administration">Administration</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-1 user-role-options">
                                    <div class="col-md-12" id="role"> 
                                        <div class="col-md-12 py-2">
                                            <h6><label for="rank">User permission</label> </h6>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="userPermission" id="userPermission" value="User" <?php if($data['role'] == 'User') echo 'checked' ?>>
                                                <label class="form-check-label" for="user">User</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="userPermission" id="moderatorPermission" value="Moderator" <?php if($data['role'] == 'Moderator') echo 'checked' ?>>
                                                <label class="form-check-label" for="moderator">Moderator</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="userPermission" id="adminPermission" value="Admin" <?php if($data['role'] == 'Admin') echo 'checked' ?>>
                                                <label class="form-check-label" for="admin">Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="userId" name="userId" value=<?php echo $userId ?>>

                                <div class="py-3 pb-4 border-bottom d-flex justify-content-end"> 
                                    <button class="btn btn-primary mr-3" onclick="adminUpdateUser(event)">Save Changes</button>
                                </div>
                                <div>
                                    <span class="msg error-message my-2" id="success-info">
                                </div>
                            </form>


                            </form>

                            <!-- Disable user -->
                            <div class="d-flex justify-content-between align-items-center pt-3" id="deactivate">
                                <div> <b>Activate/Deactivate account</b>
                                    <p>User won't be able to log in</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-danger">Deactivate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
          </div>
        </main>
      </div>
    </div>
    <script src="js/admin-dashboard.js"></script>
    <script src="../web/js/utils.js"></script>
    <!-- <script src="js/chart-pie.js"></script> -->
  </body>
</html>
