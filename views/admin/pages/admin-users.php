<?php
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


<div class="d-flex justify-content-between flex-wrap align-items-center">
            <h1>Admin Dashboard</h1>
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
                            </tbody>
                        </table>
                    </section>
                </div>
          </div>

    <script src="../views/admin/js/data-table.js"></script>
