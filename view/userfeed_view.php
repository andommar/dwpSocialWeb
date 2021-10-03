
<?php
$c = new Controller();
$posts=$c->load_posts();
foreach($posts as $post){?>

<div class="news_feed">
            <div class="news_feed_title">
              <img src="img/avatars/<?php echo $post['avatar']?>.jpg" alt="user" />
              <div class="news_feed_title_content">
                <p><?php echo $post['title'] ?></p>
                <span>12. <i class="fas fa-globe-americas"></i></span>
              </div>
            </div>
            <div class="news_feed_description">
              <p class="news_feed_subtitle">
                <?php echo $post['description'] ?>
              </p>
              <img src="img/media/<?php echo $post['media_url']?>.PNG" alt="sunflower" />
              <div class="news_feed_description_title">
                <span>YOUTUBE</span>
                <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Dolore quibusdam vitae modi perferendis earum dignissimos
                  autem, deleniti fugiat debitis sed!
                </p>
              </div>
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

            <div class="divider"><hr /></div>

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
                <i class="far fa-share"></i>
                <span>Share</span>
              </div>
            </div>
          </div> 
          <?php }; ?>