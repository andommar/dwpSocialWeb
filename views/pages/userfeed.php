<div class="row">
  <div class="col col-lg-10 col-xs-12">

    <?php
    $p = new PostController();
    $posts = $p->loadUserFeedPostsFiltered($_SESSION['userId'], 'latest');
    ?>
    <div id="userfeed_filters_section" class="dropdown d-flex justify-content-end">
      <select name="userfeed_filters" id="userfeed_filters" onchange="loadPosts(this.value, <?php echo $_SESSION['userId'] ?>);">
        <option value="latest">Latest posts</option>
        <option value="popular">Popular posts</option>
        <option value="oldest">Oldest posts</option>
        <option value="unpopular">Unpopular posts</option>
      </select>
    </div>
    <div id="filtered-posts">
      <?php foreach ($posts as $post) { ?>
        <div class="post">
          <div class="post_title">
            <img src="views/web/img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
            <div class="post_title_content">
              <p class="mb-0">
                <a href="#" class="text-decoration-none"><?php echo $post['category_name'] ?>
                  <i class="<?php echo $post['icon'] ?> mx-1"></i>
                </a>
              </p>
              <span>Posted by <b><?php echo $post['username'] ?></b></span>
            </div>
          </div>
          <div class="post_description">
            <p class="post_subtitle">
              <!-- href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" -->
              <a class="text-decoration-none dynamic-content custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)"><?php echo $post['title'] ?></a>
            </p>
            <?php if ($post['media_url']) { ?>
              <!-- <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link"> -->
              <img class="img-fluid custom-link" src="views/web/img/media/<?php echo $post['media_url'] ?>" alt="post-media" onclick="sendPostId(<?php echo $post['post_id'] ?>)" />
              <!-- </a> -->
            <?php } ?>
            <div class="post_description_title">
              <!-- <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link"> -->
              <p class="custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)">
                <?php if ($post['description']) echo $post['description'] ?>
              </p>
              <!-- </a> -->
            </div>
          </div>
          <div class="post-date-area">
            <span><?php echo $post['datetime'] ?></span>
          </div>
          <div class="votes_comments_area">
            <div class="icons">
              <!-- onclick="sendPostId(<?php //echo $post['post_id'] 
                                        ?>)" -->
              <img class="img-fluid vote_icon_size upvote_default" id="upvote_button" src="" alt="upvote button" />
              <span class="votes_number"><?php echo $post['up_votes'] ?></span>
              <img class="img-fluid vote_icon_size downvote_default" id="downvote_button" src="" alt="downvote button" />
              <span class="votes_number"><?php echo $post['down_votes'] ?></span>
            </div>
            <div class="comment_counts custom-link-text" onclick="sendPostId(<?php echo $post['post_id'] ?>)">
              <!-- <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link"> -->
              <i class="far fa-comment-alt"></i>
              <span>4 comments</span>
            </div>
          </div>
        </div>
      <?php }; ?>
    </div>
  </div>
  <div class="col col-lg-2 col-xs-12 d-flex"></div>
</div>