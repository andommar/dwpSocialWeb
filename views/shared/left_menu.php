  <ul id="left-menu_categories">
    <li>My Categories</li>
    <?php
    $c = new CategoryController();
    $categories = $c->getUserCategories();
    // $c = new CategoryController();
    // $categories = $c->loadCategories();
    foreach ($categories as $category) { ?>
      <li>
        <a href="#">
          <i class="<?php echo $category['icon'] ?>"></i>
          <span><?php echo $category['category_name'] ?></span>
        </a>
      </li>
    <?php }; ?>
  </ul>