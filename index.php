<?php
include_once('view/header.php');
//Session handler

?>
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
      <!-- Create post -->
      <!-- <?php include_once('view/user_create_post_view.php'); ?> -->
      <!-- News FEED -->
      <?php include_once('view/userfeed_view.php'); ?>

    </div>
  </div>

  <!-- Content Right -->
  <div class="content_right"></div>
</div>
</body>

</html>