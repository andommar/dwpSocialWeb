<?php
// Session handling
require_once('../../bootstrapping.php');
$session = new SessionHandle();
if ($session->confirm_logged_in()) {
  $redirect = new Redirector("../home/login.php");
}
?>
<ul id="left-menu_categories">
  <li>My Categories</li>
  <?php
  $c = new CategoryController();
  $categories = $c->getUserCategories();

  foreach ($categories as $category) { ?>
    <li class="category_names">
      <a onclick="loadSpecificCategory('<?php echo $category['category_name'] ?>')">
        <i class="<?php echo $category['icon'] ?>" id="<?php echo $category['category_name'] ?>"></i>
        <span><?php echo $category['category_name'] ?></span>
      </a>
    </li>
  <?php }; ?>
</ul>