<?php


if (isset($_SESSION['categoryPosts_dropdown'])) $categoryPosts_dropdown = $_SESSION['categoryPosts_dropdown'];

if (isset($data)) {
    $posts = $data[0];
    $votes = $data[1];
    $upvote_class = "upvote_default";
    $downvote_class = "downvote_default";
}

// We load the category posts (it's possible there are no posts yet)
if (isset($_SESSION['category_name'])) {
    $categoryName = $_SESSION['category_name'];
}

// We load the categories as well to get the icons (we need them in case the category doesn't have posts)
$c = new CategoryController();
$categories = $c->loadCategories();

?>
<div class="row">
    <?php
    echo '<script type="text/javascript">scrollToTop();</script>';
    ?>
    <div class="col col-lg-12 col-xs-12 p-0">
        <div id="category-header">
            <p class="mb-0 text-center">
                <?php foreach ($categories as $category) { ?>
                    <?php if ($category['category_name'] == $categoryName) { ?> <i class="<?php echo $category['icon'] ?> mx-1"></i> <?php } ?>
                <?php } ?>
                <?php echo $categoryName ?>
            </p>
        </div>
        <?php if (isset($categoryPosts_dropdown) && isset($data)) { ?>
            <div id="category-posts_filters_section" class="dropdown d-flex justify-content-end">
                <select name="category-posts_filters" id="category-posts_filters" onchange="loadCategoryPosts(this.value);">
                    <option value="latest" <?php if ($categoryPosts_dropdown == 'latest') echo 'selected="selected"' ?>>Latest posts</option>
                    <option value="popular" <?php if ($categoryPosts_dropdown == 'popular') echo 'selected="selected"' ?>>Popular posts</option>
                    <option value="oldest" <?php if ($categoryPosts_dropdown == 'oldest') echo 'selected="selected"' ?>>Oldest posts</option>
                    <option value="unpopular" <?php if ($categoryPosts_dropdown == 'unpopular') echo 'selected="selected"' ?>>Unpopular posts</option>
                </select>
            </div>
        <?php } ?>
        <div id="category-posts">
            <?php if (isset($data)) {
                foreach ($posts as $post) { ?>
                    <div class="post">
                        <div class="post_title">
                            <img src="views/web/img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
                            <div class="post_title_content">
                                <span>Posted by <b><?php echo $post['username'] ?></b></span>
                            </div>
                        </div>
                        <div class="post_description">
                            <p class="post_subtitle">
                                <a class="text-decoration-none dynamic-content custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)"><?php echo $post['title'] ?></a>
                            </p>
                            <?php if ($post['media_url']) { ?>
                                <img class="img-fluid custom-link" src="views/web/img/media/<?php echo $post['media_url'] ?>" alt="post-media" onclick="sendPostId(<?php echo $post['post_id'] ?>)" />
                            <?php } ?>
                            <?php if ($post['description']) { ?>
                                <div class="post_description_title">

                                    <p class="custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)">
                                        <?php if ($post['description']) echo $post['description'] ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="post-date-area">
                            <span><?php echo $post['datetime'] ?></span>
                        </div>
                        <div class="votes_comments_area">
                            <div class="icons" id="<?php echo $post['post_id'] ?>">
                                <?php
                                if (isset($votes[$post['post_id']])) {
                                    if ($votes[$post['post_id']] == "0") {
                                        $downvote_class = 'downvote_filled';
                                    } else if ($votes[$post['post_id']] == "1") {
                                        $upvote_class = 'upvote_filled';
                                    }
                                }
                                ?>
                                <img class="img-fluid upvote_button vote_icon_size <?php echo $upvote_class; ?>" src="https://i.imgur.com/cJ150o7.png" alt="upvote button" onclick="ratePost(<?php echo $post['post_id'] ?>,1)" />
                                <span class="votes_number purple_color total_upvotes"><?php echo $post['up_votes'] ?></span>
                                <img class="img-fluid downvote_button vote_icon_size <?php echo $downvote_class; ?>" src="https://i.imgur.com/f50DFkG.png" alt="downvote button" onclick="ratePost(<?php echo $post['post_id'] ?>,0)" />
                                <span class="votes_number red_color total_downvotes"><?php echo $post['down_votes'] ?></span>
                            </div>
                            <div class="comment_counts custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)">
                                <i class="far fa-comment-alt"></i>
                                <?php if ($post['total_comments'] == 0) { ?>
                                    <span>No comments yet</span>
                                <?php } else if (($post['total_comments'] == 1)) { ?>
                                    <span><?php echo $post['total_comments']; ?> comment</span>
                                <?php } else { ?>
                                    <span><?php echo $post['total_comments']; ?> comments</span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php };
            } else { ?>
                <div class="no-posts-message">
                    <p class="m-0">This category doesn't have posts yet.</p>
                </div>
            <?php } ?>

        </div>
    </div>
    <div class="col col-lg-2 col-xs-12 d-flex"></div>
</div>