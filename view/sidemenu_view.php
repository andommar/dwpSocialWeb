<div class="content_left">
  <ul>
    <li>
      <a href="#">
        <img src="img/avatars/avatar.jpg" alt="avatar" />
        <span>Monke monki</span>
      </a>
    </li>
    <?php
    $c = new Controller();
    $categories = $c->loadCategories();
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