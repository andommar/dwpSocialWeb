<?php
// Load post info
// $postID = $_GET['ID'];
$p = new PostController();
// $post = $p->loadPostById($postID);
$post = $p->loadPostById($id);

?>


<!-- Main content -->
<div class="row">
    <div class="col col-lg-10 col-xs-12">
        <div class="show_post min-vh-100">
            <div class="post_title">
                <img src="views/web/img/avatars/<?php echo $post[0]['avatar'] ?>" alt="user" />
                <div class="post_title_content">
                    <p class="mb-0">
                        <?php echo $post[0]['category_name'] ?>
                        <i class="<?php echo $post[0]['icon'] ?> mx-1"></i>
                    </p>
                    <span>Posted by <b><?php echo $post[0]['username'] ?></b></span>
                </div>
            </div>
            <div class="post_description">
                <p style="font-size:17px; font-weight:400;" class="post_subtitle">
                    <?php echo $post[0]['title'] ?>
                </p>
                <?php if ($post[0]['media_url']) { ?><img class="img-fluid" src="views/web/img/media/<?php echo $post[0]['media_url'] ?>" alt="post-media" /> <?php } ?>
                <div class="post_description_title">
                    <p>
                        <?php if ($post[0]['description']) echo $post[0]['description'] ?>
                    </p>
                </div>
            </div>
            <div class="post-date-area">
                <span><?php echo $post[0]['datetime'] ?></span>
            </div>
            <div class="likes_area">
                <div class="emojis">
                    <span>&#129373;</span>
                    <span><?php echo $post[0]['up_votes'] ?></span>
                    <span>&#127813;</span>
                    <span><?php echo $post[0]['down_votes'] ?></span>
                </div>
                <div class="comment_counts">

                    <i class="far fa-comment-alt"></i>
                    <span>4 comments</span>

                    <!-- <span>13 shares</span> -->
                </div>
            </div>


        </div>
    </div>
    <!-- Post Content End -->
    <!-- Content Right | Not implemented yet -->
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
</div>