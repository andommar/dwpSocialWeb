<?php
include_once('view/header.php');
// include_once "controller/ViewController.php";
// include_once('models/SessionHandle.php');

if (isset($_POST['submit'])) {

  if (($_FILES['imgfile']['type'] == 'image/jpeg'  ||
      $_FILES['imgfile']['type'] == 'image/jpg'   ||
      $_FILES['imgfile']['type'] == 'image/png'   ||
      $_FILES['imgfile']['type'] == 'image/gif') &&
    ($_FILES['imgfile']['size'] < 10000000)
  ) {
    if ($_FILES['imgfile']['error'] > 0) {
      echo "Error: " . $_FILES['imgfile']['error'];
    } else {
      move_uploaded_file($_FILES['imgfile']['tmp_name'], "img/media/" . $_FILES['imgfile']['name']);
    }
  }
  $message = ['title' => '', 'category' => '', 'description' => '',];
  $msg = validateNewPost($_POST['title'], $_POST['category'], $_FILES['imgfile']['name'], $_POST['description'], $message);
}

?>


<div class="row d-flex justify-content-center">
  <?php include_once('view/left_menu.php'); ?>

  <div id="post-form" class="col col-lg-8">
    <section>
      <div class="container-form">
        <h2 class="f-heading">
          <span>New post</span>
        </h2>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category">
              <option value="Categroy">Select category</option>
              <option value="News">News</option>
              <option value="Sports">Sports</option>
              <option value="Photography">Photography</option>
            </select>
          </div>
          <div class="form-group">
            <label for="title">Description</label>
            <textarea type="text" name="description" id="description"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="imgfile" id="imgfile">
          </div>
          <input type="submit" name="submit" value="Create">
          <p class="message info-message"><?php echo isset($msg['database']) ? $msg['database'] : '' ?></p>
        </form>
      </div>
    </section>
  </div>
  <?php include_once('view/right_menu.php'); ?>
</div>





</div> <!-- header view container fluid div-->
</body>