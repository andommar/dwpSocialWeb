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
          <i class="<?php echo $category['icon'] ?>"></i>
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