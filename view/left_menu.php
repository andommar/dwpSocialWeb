<div class="content_left col col-lg-2 col-xs-12 d-flex">
  <ul>
    <!-- <li>
      <a href="#">
        <img src="img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" />
        <span><?php echo $userData['username'] ?></span>
      </a>
    </li> -->
    <li>My Categories</li>
    <?php
    $c = new CategoryController();
    $categories = $c->getUserCategories();
    // $c = new Controller();
    // $categories = $c->loadCategories();
    foreach ($categories as $value) { ?>
      <li>
        <a href="#">
          <?php if ($value['category_name'] == 'Sports') : ?>
            <i class="fas fa-running"></i>
          <?php elseif ($value['category_name'] == 'Videos') : ?>
            <i class="fas fa-video"></i>
          <?php elseif ($value['category_name'] == 'News') : ?>
            <i class="fas fa-newspaper"></i>
          <?php elseif ($value['category_name'] == 'Music') : ?>
            <i class="fas fa-music"></i>
          <?php elseif ($value['category_name'] == 'Photography') : ?>
            <i class="fas fa-photo-video"></i>
          <?php elseif ($value['category_name'] == 'Films') : ?>
            <i class="fas fa-film"></i>
          <?php endif; ?>
          <span><?php echo $value['category_name'] ?></span>
        </a>
      </li>
    <?php }; ?>
    <li>
      <a href="#">
        <i class="fas fa-arrow-down"></i>
        <span class="see_more">See more</span>
      </a>
    </li>
  </ul>
</div>