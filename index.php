<?php
include_once('controller/Controller.php');
include_once('view/header.php'); ?>

<!-- Content -->
<div class="content">
  <?php include_once('view/sidemenu_view.php'); ?>
  <div class="content_center">
    <div class="stories">
      <img src="https://picsum.photos/id/022/110/200" alt="" />
      <img src="https://picsum.photos/id/122/110/200" alt="" />
      <img src="https://picsum.photos/id/352/110/200" alt="" />
      <img src="https://picsum.photos/id/439/110/200" alt="" />
      <img src="https://picsum.photos/id/582/110/200" alt="" />
      <img src="https://picsum.photos/id/072/110/200" alt="" />
    </div>
    <div class="media_container">
      <div class="share">
        <div class="share_upside">
          <img src="img/avatars/avatar.jpg" alt="avatar" />
          <input type="text" name="post_profile" placeholder="Whats on your mind?" />
        </div>
        <hr />
        <div class="share_downside">
          <div class="share_downside_link">
            <i class="fa fa-video live-video-icon"></i>
            <span>Live Video</span>
          </div>
          <div class="share_downside_link">
            <i class="fas fa-photo-video photo-video-icon"></i>
            <span>Photo/Video</span>
          </div>
          <div class="share_downside_link">
            <i class="fas fa-grin-alt feeling-icon"></i>
            <span>Feeling/Activity</span>
          </div>
        </div>
      </div>
      <!-- News FEED -->
      <?php include_once('view/userfeed_view.php'); ?>

    </div>
  </div>

  <!-- Content Right -->
  <div class="content_right"></div>
</div>
</body>

</html>