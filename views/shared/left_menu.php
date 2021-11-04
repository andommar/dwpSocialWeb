<div class="content_left col col-lg-2 col-xs-12 d-flex">
  <ul>
    <!-- <li>
      <a href="#">
        <img src="web/img/avatars/<?php echo $userData['avatar'] ?>" alt="avatar" />
        <span><?php echo $userData['username'] ?></span>
      </a>
    </li> -->
    <li>My Categories</li>
    <?php
    $c = new CategoryController();
    $categories = $c->getUserCategories();
    // $c = new Controller();
    // $categories = $c->loadCategories();
    foreach ($categories as $category) { ?>
      <li>
        <a href="#">
          <?php if ($category['category_name'] == 'Sports') : ?>
            <i class="fas fa-running"></i>
          <?php elseif ($category['category_name'] == 'Videos') : ?>
            <i class="fas fa-video"></i>
          <?php elseif ($category['category_name'] == 'News') : ?>
            <i class="fas fa-newspaper"></i>
          <?php elseif ($category['category_name'] == 'Music') : ?>
            <i class="fas fa-music"></i>
          <?php elseif ($category['category_name'] == 'Photography') : ?>
            <i class="fas fa-photo-video"></i>
          <?php elseif ($category['category_name'] == 'Films') : ?>
            <i class="fas fa-film"></i>
          <?php elseif ($category['category_name'] == 'Animals') : ?>
            <i class="fas fa-paw"></i>
          <?php elseif ($category['category_name'] == 'Art') : ?>
            <i class="fas fa-palette"></i>
          <?php elseif ($category['category_name'] == 'Books') : ?>
            <i class="fas fa-book-open"></i>
          <?php elseif ($category['category_name'] == 'Finance') : ?>
            <i class="fas fa-landmark"></i>
          <?php elseif ($category['category_name'] == 'Fitness') : ?>
            <i class="fas fa-dumbbell"></i>
          <?php elseif ($category['category_name'] == 'Food') : ?>
            <i class="fas fa-hamburger"></i>
          <?php elseif ($category['category_name'] == 'Health') : ?>
            <i class="fas fa-heartbeat"></i>
          <?php elseif ($category['category_name'] == 'Gaming') : ?>
            <i class="fas fa-gamepad"></i>
          <?php elseif ($category['category_name'] == 'Humor') : ?>
            <i class="fas fa-grin-squint"></i>
          <?php elseif ($category['category_name'] == 'Science') : ?>
            <i class="fas fa-flask"></i>
          <?php elseif ($category['category_name'] == 'Shows') : ?>
            <i class="fab fa-youtube"></i>
          <?php elseif ($category['category_name'] == 'Tech') : ?>
            <i class="fas fa-mobile-alt"></i>
          <?php endif; ?>
          <span><?php echo $category['category_name'] ?></span>
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