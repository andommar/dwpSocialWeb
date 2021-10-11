<?php
include_once('view/header.php');
include_once "controller/ViewController.php";


echo "Hey im". $_SESSION['userId'] . " with name" . $_SESSION['username'];

if(isset($_POST['submit'])){

  if(($_FILES['imgfile']['type'] == 'image/jpeg'  ||
      $_FILES['imgfile']['type'] == 'image/jpg'   ||
      $_FILES['imgfile']['type'] == 'image/png'   ||
      $_FILES['imgfile']['type'] == 'image/gif'   ) &&
      ($_FILES['imgfile']['size'] < 10000000 )) {
        if ($_FILES['imgfile']['error']>0){
          echo "Error: ". $_FILES['imgfile']['error'];
      } else {
        move_uploaded_file($_FILES['imgfile']['tmp_name'], "img/media/".$_FILES['imgfile']['name']);
        echo "stored in: img/media/".$_FILES['imgfile']['name'];
      }
    }

  $message = ['title' => '', 'category' => '', 'description' => '',];
  var_dump($_FILES['imgfile']['name']);
  $msg = validateNewPost($_POST['title'], $_POST['category'],$_FILES['imgfile']['name'], $_POST['description'], $message);
}

?>

<section id="post-form">
  <div class="container-form">
    <h1 class="f-heading">
      <span class="text-primary">New post</span>
    </h1>
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
        <input type="submit" name="submit" value="New post">
        <p><?php echo $msg ?></p>
    </form>
  </div>
</section>