<div class="row">
  <div class="col col-lg-12 col-xs-12">
    <div id="userfeed_filters_section" class="dropdown d-flex justify-content-end">
      <select name="userfeed_filters" id="userfeed_filters" onchange="loadPosts(this.value, <?php echo $_SESSION['userId'] ?>);">
        <option value="latest">Latest posts</option>
        <option value="popular">Popular posts</option>
        <option value="oldest">Oldest posts</option>
        <option value="unpopular">Unpopular posts</option>
      </select>
    </div>
    <input type="hidden" id="usr" value="<?php echo $_SESSION['userId'] ?>">
    <div id="filtered-posts"></div>
  </div>
</div>