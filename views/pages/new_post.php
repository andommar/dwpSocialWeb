<?php

$c = new CategoryController();
$categories = $c->loadCategories();


?>


<div class="row d-flex justify-content-center min-vh-100">

  <div id="post-form" class="col col-lg-10">
    <section>
      <div class="container-form min-vh-100">
        <h2 class="f-heading">
          <span>New post</span>
        </h2>
        <form action="" method="post" enctype="multipart/form-data" id="new-post-form">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <span class="msg error-message-dark my-2" id="title-error">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category">
              <option value="Category">Select category</option>
              <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['category_name'] ?>"><?php echo $category['category_name'] ?></option>
              <?php } ?>
            </select>
            <span class="msg error-message-dark my-2" id="category-error">
          </div>
          <div class="form-group">
            <label for="title">Description</label>
            <textarea type="text" name="description" id="description"></textarea>
            <span class="msg error-message-dark my-2" id="description-error">
          </div>
          <div class="form-group">
            <input type="file" name="imgfile" id="imgfile">
            <span class="msg error-message-dark my-2" id="image-error">
          </div>
          <input type="hidden" name="userId" id="userId" value="<?php echo $_SESSION['userId'] ?>">
          <div id="error-msg"></div>
          <button class="btn" type="button" id="new_post-submit-btn" onclick="submitNewPostForm()"> Create</button>

        </form>
      </div>
    </section>
  </div>
</div>