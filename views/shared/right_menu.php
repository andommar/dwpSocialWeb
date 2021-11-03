<div class="col col-lg-2 col-xs-12 content_right d-flex justify-content-left">
    <ul>
        <li>All Categories</li>
        <?php
        $c = new CategoryController();
        $categories = $c->loadCategories();
        foreach ($categories as $value) { ?>
            <li>
                <a href="#">
                    <?php if ($value['category_name'] == 'Sports') : ?>
                        <i class="fas fa-running"></i>
                    <?php elseif ($value['category_name'] == 'Videos') : ?>
                        <i class="fas fa-video"></i>
                    <?php elseif ($value['category_name'] == 'News') : ?>
                        <i class="fas fa-newspaper"></i>
                    <?php elseif ($value['category_name'] == 'Music') : ?>
                        <i class="fas fa-music"></i>
                    <?php elseif ($value['category_name'] == 'Photography') : ?>
                        <i class="fas fa-photo-video"></i>
                    <?php elseif ($value['category_name'] == 'Films') : ?>
                        <i class="fas fa-film"></i>
                    <?php endif; ?>
                    <span><?php echo $value['category_name'] ?></span>
                </a>
            </li>
        <?php }; ?>
    </ul>
</div>