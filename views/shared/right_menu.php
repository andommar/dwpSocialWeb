<div class="col col-lg-2 col-xs-12 content_right d-flex justify-content-left">
    <ul>
        <li>All Categories</li>
        <?php
        $c = new CategoryController();
        $category = $c->loadCategoryById($categoryName);
       
    </ul>
</div>