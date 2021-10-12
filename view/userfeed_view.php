<?php
$c = new Controller();
$posts = $c->loadUserFeedPosts();
foreach ($posts as $post) { ?>

  <div class="news_feed">
    <div class="news_feed_title">
      <img src="img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
      <div class="news_feed_title_content">
        <p>
          <?php echo $post['category_name'] ?>
          <?php if ($post['category_name'] == 'Sports') : ?>
            <i class="fas fa-running"></i>
          <?php elseif ($post['category_name'] == 'Videos') : ?>
            <i class="fas fa-video"></i>
          <?php elseif ($post['category_name'] == 'News') : ?>
            <i class="fas fa-newspaper"></i>
          <?php elseif ($post['category_name'] == 'Music') : ?>
            <i class="fas fa-music"></i>
          <?php elseif ($post['category_name'] == 'Photography') : ?>
            <i class="fas fa-photo-video"></i>
          <?php elseif ($post['category_name'] == 'Films') : ?>
            <i class="fas fa-film"></i>
          <?php endif; ?>
        </p>
        <span><i><?php echo $post['username'] ?></i></span>
      </div>
    </div>
    <div class="news_feed_description">
      <p style="font-size:17px; font-weight:400;" class="news_feed_subtitle">
        <?php echo $post['title'] ?>
      </p>
      <img src="img/media/<?php echo $post['media_url'] ?>" alt="post-media" />
      <div class="news_feed_description_title">
        <!-- <span>YOUTUBE</span> -->
        <p>
          <?php echo $post['description'] ?>
        </p>
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
        <span>4 comments</span>
        <span>13 shares</span>
      </div>
    </div>

    <div class="divider">
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
    </div>
  </div>
<?php }; ?>