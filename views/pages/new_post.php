<?php
// include_once('header.php');
// include_once "controller/ViewController.php";
// include_once('models/SessionHandle.php');

// echo (__FILE__);

// if (isset($_POST['submit'])) {

//   if (($_FILES['imgfile']['type'] == 'image/jpeg'  ||
//       $_FILES['imgfile']['type'] == 'image/jpg'   ||
//       $_FILES['imgfile']['type'] == 'image/png'   ||
//       $_FILES['imgfile']['type'] == 'image/gif') &&
//     ($_FILES['imgfile']['size'] < 10000000)
//   ) {
//     if ($_FILES['imgfile']['error'] > 0) {
//       echo "Error: " . $_FILES['imgfile']['error'];
//     } else {
//       move_uploaded_file($_FILES['imgfile']['tmp_name'], "web/img/media/" . $_FILES['imgfile']['name']);
//     }
//   }
//   $p = new PostController();
//   $p->newPost($_SESSION['userId'], $_POST['title'], $_POST['category'], $_FILES['imgfile']['name'], $_POST['description']);
// }



$c = new CategoryController();
$categories = $c->loadCategories();


?>


<div class="row d-flex justify-content-center">

  <div id="post-form" class="col col-lg-10">
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
              <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['category_name'] ?>"><?php echo $category['category_name'] ?></option>
              <?php } ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="title">Description</label>
            <textarea type="text" name="description" id="description"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="imgfile" id="imgfile">
          </div>
          <div id="error-msg"></div>
          <button class="btn" type="button" id="new_post-submit-btn" onclick="submitNewPostForm(2)"> Create</button>

        </form>
      </div>
    </section>
  </div>
</div>