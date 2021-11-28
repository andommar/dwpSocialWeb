<?php
if (isset($_SESSION['userfeed_dropdown'])) $userfeed_dropdown = $_SESSION['userfeed_dropdown'];
if (isset($data)) {
  $posts = $data[0];
  $votes = $data[1];
  $upvote_class = "upvote_default";
  $downvote_class = "downvote_default";
}
?>
<div class="row">
  <div class="col col-lg-12 col-xs-12">
    <?php if (isset($userfeed_dropdown)) { ?>
      <div id="userfeed_filters_section" class="dropdown d-flex justify-content-end">
        <select name="userfeed_filters" id="userfeed_filters" onchange="loadPosts(this.value);">
          <option value="latest" <?php if ($userfeed_dropdown == 'latest') echo 'selected="selected"' ?>>Latest posts</option>
          <option value="popular" <?php if ($userfeed_dropdown == 'popular') echo 'selected="selected"' ?>>Popular posts</option>
          <option value="oldest" <?php if ($userfeed_dropdown == 'oldest') echo 'selected="selected"' ?>>Oldest posts</option>
          <option value="unpopular" <?php if ($userfeed_dropdown == 'unpopular') echo 'selected="selected"' ?>>Unpopular posts</option>
        </select>
      </div>
    <?php } ?>
    <div id="filtered-posts">
      <?php
      if (isset($data)) {
        foreach ($posts as $post) { ?>
          <div class="post">
            <div class="post_title">
              <img src="views/web/img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
              <div class="post_title_content">
                <p class="mb-0">
                  <a onclick="loadSpecificCategory('<?php echo $post['category_name'] ?>')" class="text-decoration-none"><?php echo $post['category_name'] ?>
                    <i class="<?php echo $post['icon'] ?> mx-1"></i>
                  </a>
                </p>
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
          <?php // We reset the up/downvote icon values  
          $upvote_class = "upvote_default";
          $downvote_class = "downvote_default"; ?>
      <?php }
      } ?>
    </div>
  </div>
</div>