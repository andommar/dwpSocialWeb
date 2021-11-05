<div class="col col-lg-8 col-xs-12">
  <!-- Stories section  -->
  <!-- <div class="stories d-flex justify-content-center align-items-center">
    <img src="https://picsum.photos/id/022/110/200" alt="" />
    <img src="https://picsum.photos/id/122/110/200" alt="" />
    <img src="https://picsum.photos/id/352/110/200" alt="" />
    <img src="https://picsum.photos/id/439/110/200" alt="" />
    <img src="https://picsum.photos/id/582/110/200" alt="" />
    <img src="https://picsum.photos/id/072/110/200" alt="" />
  </div> -->
  <?php
  $c = new PostController();
  $posts = $c->loadUserFeedPosts();
  foreach ($posts as $post) { ?>
    <div class="news_feed">
      <div class="news_feed_title">
        <img src="./views/web/img/avatars/<?php echo $post['avatar'] ?>" alt="user" />
        <div class="news_feed_title_content">
          <p class="mb-0">
            <?php echo $post['category_name'] ?>
            <i class="<?php echo $post['icon'] ?> mx-1"></i>
          </p>
          <span><i><?php echo $post['username'] ?></i></span>
        </div>
      </div>
      <div class="news_feed_description">
        <p style="font-size:17px; font-weight:400;" class="news_feed_subtitle">
          <?php echo $post['title'] ?>
        </p>
        <?php if ($post['media_url']) { ?><img class="img-fluid" src="./views/web/img/media/<?php echo $post['media_url'] ?>" alt="post-media" /> <?php } ?>
        <div class="news_feed_description_title">
          <!-- <span>YOUTUBE</span> -->
          <p>
            <?php if ($post['description']) echo $post['description'] ?>
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
</div>