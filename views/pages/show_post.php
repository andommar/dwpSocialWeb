<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../web/css/styles.css" />
    <link rel="stylesheet" href="../web/css/new_post.css" />
    <link rel="stylesheet" href="../web/css/show_post.css" />

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Monkia · Post</title>
</head>

<?php
//Session handler
spl_autoload_register(function ($class) {
    $pathController = '../../controller/' . $class . '.php';
    $pathModel = '../../models/' . $class . '.php';

    if (file_exists($pathController)) {
        require_once $pathController;
    } else if (file_exists($pathModel)) {
        require_once $pathModel;
    }
});

$session = new SessionHandle();
if ($session->confirm_logged_in()) {
    $redirect = new Redirector("../home/login.php");
}
// Lines needed for the header to load user info (can be a problem)
$c = new UserController();
$userData = $c->getUserInfo();
// Load post info
$postID = $_GET['ID'];
$p = new PostController();
$post = $p->loadPostById($postID);
?>

<body>
    <div class="container-fluid d-flex flex-column">
        <?php include_once('../shared/header.php'); ?>
        <div class="row">
            <!-- Side menu -->
            <div class="content_left col col-lg-2 col-xs-12 d-flex">
                <?php include_once('../shared/left_menu.php'); ?>
            </div>
            <!-- Post content -->
            <div class="col col-lg-8 col-xs-12">
                <div class="post">
                    <div class="post_title">
                        <img src="../web/img/avatars/<?php echo $post[0]['avatar'] ?>" alt="user" />
                        <div class="post_title_content">
                            <p class="mb-0">
                                <?php echo $post[0]['category_name'] ?>
                                <i class="<?php echo $post[0]['icon'] ?> mx-1"></i>
                            </p>
                            <span><i><?php echo $post[0]['username'] ?></i></span>
                        </div>
                    </div>
                    <div class="post_description">
                        <p style="font-size:17px; font-weight:400;" class="post_subtitle">
                            <?php echo $post[0]['title'] ?>
                        </p>
                        <?php if ($post[0]['media_url']) { ?><img class="img-fluid" src="../web/img/media/<?php echo $post[0]['media_url'] ?>" alt="post-media" /> <?php } ?>
                        <div class="post_description_title">
                            <p>
                                <?php if ($post[0]['description']) echo $post[0]['description'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="post-date-area">
                        <span><?php echo $post[0]['datetime'] ?></span>
                    </div>
                    <div class="likes_area">
                        <div class="emojis">
                            <span>&#129373;</span>
                            <span><?php echo $post[0]['up_votes'] ?></span>
                            <span>&#127813;</span>
                            <span><?php echo $post[0]['down_votes'] ?></span>
                        </div>
                        <div class="comment_counts">

                            <i class="far fa-comment-alt"></i>
                            <span>4 comments</span>

                            <!-- <span>13 shares</span> -->
                        </div>
                    </div>


                </div>
            </div>
            <!-- Post Content End -->
            <!-- Content Right | Not implemented yet -->
            <div class="col col-lg-2 col-xs-12 content_right d-flex justify-content-left">
                <?php
                $c = new CategoryController();
                $category = $c->loadCategoryById($post[0]['category_name']);
                ?>
                <div id="category-section " class="m-3 text-center">
                    <p><?php echo $category[0]['category_name'] ?></p>
                </div>


            </div>
        </div>
        <!--Row  -->
    </div> <!-- container fluid -->
</body>

</html>