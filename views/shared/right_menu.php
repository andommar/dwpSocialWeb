<!--   Col derecha dimensiones    <div class="col col-lg-10 col-xs-12"> -->

<div class="col col-lg-2 col-xs-12 content_right d-flex justify-content-center min-vh-100">
        <?php
        $c = new CategoryController();
        $category = $c->loadCategoryById($post[0]['category_name']);
        $followers = $c->getCategoryFollowers($post[0]['category_name']);
        ?>
        <div id="show-post_category-section" class="m-3 text-center">
            <i class="<?php echo $category[0]['icon'] ?> mt-3"></i>
            <p id="category-name"><?php echo $category[0]['category_name'] ?></p>
            <p id="category-members"><strong><?php echo $followers[0]['total'] ?></strong> <span>Members</span></p>
            </hr>
            <p id="category-description"><?php echo $category[0]['description'] ?></p>


            <!-- USER SESSION -- NEEDS TO BE FIXED -->
            <?php
            $session = new SessionHandle();
            if ($session->confirm_logged_in()) {
                $redirect = new Redirector("views/home/login.php");
            }
            $u = new UserController();
            $userData = $u->getUserInfo();

            // Check if user follows the category

            if ($userData) {
                $c = new CategoryController();
                $category = $c->isUserFollower($category[0]['category_name'], (int)$userData['userId']);
            }
            ?>
            <!-- Follow category button. Depending on whether the user is a follower of the category or not-->
            <?php if ((int)$category[0]['total'] > 0) { ?>
                <button type="button" class="btn btn-leave">Leave Category</button>
            <?php } else { ?>
                <button type="button" class="btn btn-join">Join Category</button>
            <?php } ?>


        </div>

    </div>