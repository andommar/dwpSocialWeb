<?php 
$data = $a->getCommentsData();

if((isset($_GET['delete'])) && ($a->isUserAdmin($_SESSION['userId']))){
    $a->deleteComment($_GET['delete']);
}
?>

<div class="d-flex justify-content-between flex-wrap align-items-center">
            <h1>Admin Dashboard</h1>
          </div>
            <!-- Tables section  -->
            <div class="row">
                <div class="my-3">
                    <section id="commentSection">
                        <h4 class="text-muted">Posts</h4>
                        <table id="display_table" class="table table-striped table-bordered table-hover table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="th-sm">Id</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Post</th>
                                <th class="th-sm">User comment</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $comment) {
                                echo '<tr>';
                                echo '<td> '.$comment['comment_id'].'</td>';
                                echo '<td> '.$comment['username'].'</td>';
                                echo '<td> '.$comment['title'].'</td>';
                                echo '<td> ';
                                echo (strlen($comment['description'])>=50) ? substr($comment['description'], 0, 50).'...': $comment['description'];
                                echo '</td>';
                                echo '<td> '.date("d-m-Y, H:i",strtotime($comment['datetime'])).'</td>';
                                echo '<td>';
                                echo '<a href="comments.php?delete='.$comment['comment_id'].'" class="delete" 
                                    onclick="return confirm(\'Are you sure you want to delete this comment?\');"><i class="fas fa-trash"></i></a>';
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
