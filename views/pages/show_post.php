<?php
// Load post info
// $postID = $_GET['ID'];
$p = new PostController();
// $post = $p->loadPostById($postID);
$post = $p->loadPostById($data);

$c = new CommentController();
$comments = $c->loadCommentsbyPostId($data);

?>


<!-- Main content -->
<div class="row">
    <div class="col col-lg-10 col-xs-12">
        <div class="row">
            <div class="col col-lg-12 justify-content-center">
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
                        <!-- <div class="comment_counts">

                            <i class="far fa-comment-alt"></i>
                            <span>4 comments</span>
                        </div> -->
                    </div>
                    <!-- Comment section -->
                    <!-- <div class="row">
                        <div class="col col-lg-12 d-flex justify-content-left ml-3 mt-3">
                            <div class="col-2 px-3">
                                <img src="views/web/img/avatars/avatar_7.png" alt="" class="rounded-circle comment-avatar">
                            </div>
                            <div class="col comment-post" >
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, velit! Provident temporibus aperiam quos saepe quae quaerat excepturi repellendus doloremque.</p>
                            </div>
                        </div>
                    </div> -->

                    <?php foreach ($comments as $comment) { ?>
                        <div class="row">
                            <div class="col col-lg-12 d-flex justify-content-left ml-3 mt-3">
                                <div class="col-2 px-3">
                                    <img src="views/web/img/avatars/<?php echo $comment['avatar']; ?>" alt="user-avatar" class="rounded-circle comment-avatar">
                                    <span class="comment-username"><?php echo $comment['username']; ?></span>
                                </div>
                                <div class="col comment-post">
                                    <p><?php echo $comment['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>

                </div>
            </div>
        </div>




    </div>
    <!-- Post Content End -->
    <!-- Content Right | Not implemented yet -->

</div>