<?php
$c = new PostController();
$posts = $c->loadUserFeedPosts();
foreach ($posts as $post) { ?>
  <div class="post">
    <div class="post_title">
      <img src="./views/web/img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
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
      <p style="font-size:17px; font-weight:400;" class="post_subtitle">
        <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none"><?php echo $post['title'] ?></a>
      </p>
      <?php if ($post['media_url']) { ?>
        <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link">
          <img class="img-fluid" src="./views/web/img/media/<?php echo $post['media_url'] ?>" alt="post-media" />
        </a>
      <?php } ?>
      <div class="post_description_title">
        <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link">
          <p>
            <?php if ($post['description']) echo $post['description'] ?>
          </p>
        </a>
      </div>
    </div>
    <div class="post-date-area">
      <span><?php echo $post['datetime'] ?></span>
    </div>
    <div class="likes_area">
      <div class="emojis">
        <span>&#129373;</span>
        <span><?php echo $post['up_votes'] ?></span>
        <span>&#127813;</span>
        <span><?php echo $post['down_votes'] ?></span>
      </div>
      <div class="comment_counts">
        <a href="views/pages/show_post.php?ID=<?php echo $post['post_id'] ?>" class="text-decoration-none custom-link">
          <i class="far fa-comment-alt"></i>
          <span>4 comments</span>
        </a>
        <!-- <span>13 shares</span> -->
      </div>
    </div>

    <!-- <div class="divider">
      <hr />
    </div>

    <div class="likes_buttons">
      <div class="likes_buttons_links">
        <i class="far fa-thumbs-up"></i>
        <span>Like</span>
      </div>
      <div class="likes_buttons_links">
        <i class="far fa-comment-alt"></i>
        <span>Comment</span>
      </div>
      <div class="likes_buttons_links">
        <i class="fas fa-share-alt"></i>
        <span>Share</span>
      </div>
    </div> -->
  </div>
<?php }; ?>