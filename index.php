
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <title>DwpUnknown</title>
  </head>
  <body>
    <div class="navbar">
      <div class="navbar_left">
        <img class="navbar_logo" src="img/fb-icon.png" alt="avatar" />
        <div class="input-icons">
          <i class="fas fa-search icon"></i>
          <input
            type="text"
            class="input-field"
            name="srch_input"
            placeholder="Search"
          />
        </div>
      </div>
      <div class="navbar_center">
        <a href="#" class="active_icon">
          <i class="fas fa-home"></i>
        </a>
        <a href="#">
          <i class="fas fa-user-friends"></i>
        </a>
        <a href="#">
          <i class="fas fa-circle"></i>
        </a>
        <a href="#">
          <i class="fas fa-archive"></i>
        </a>
        <a href="#">
          <i class="fas fa-users"></i>
        </a>
      </div>

      <div class="navbar_right">
        <div class="navbar_profile">
          <img src="img/avatar.jpg" alt="avatar" />
          <span>Monke</span>
        </div>
        <div class="navbar_links">
          <i class="fa fa-plus"></i>
          <i class="fab fa-facebook-messenger"></i>
          <i class="fa fa-bell"></i>
          <i class="fas fa-arrow-down"></i>
        </div>
      </div>
    </div>
    <!-- Content -->
    <div class="content">
      <div class="content_left">
        <ul>
          <li>
            <a href="#">
              <img src="img/avatar.jpg" alt="avatar" />
              <span>Monke monki</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-running"></i>
              <span>Sports</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-video"></i>
              <span>Videos</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-newspaper"></i>
              <span>News</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-music"></i>
              <span>Music</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-photo-video"></i>
              <span>Photography</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-film"></i>
              <span>Films</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-arrow-down"></i>
              <span class="see_more">See more</span>
            </a>
          </li>
        </ul>
      </div>    
      <div class="content_center">
        <div class="stories">
          <img src="https://picsum.photos/id/022/110/200" alt="" />
          <img src="https://picsum.photos/id/122/110/200" alt="" />
          <img src="https://picsum.photos/id/352/110/200" alt="" />
          <img src="https://picsum.photos/id/439/110/200" alt="" />
          <img src="https://picsum.photos/id/582/110/200" alt="" />
          <img src="https://picsum.photos/id/072/110/200" alt="" />
        </div>
        <div class="media_container">
          <div class="share">
            <div class="share_upside">
              <img src="img/avatar.jpg" alt="avatar" />
              <input
                type="text"
                name="post_profile"
                placeholder="Whats on your mind?"
              />
            </div>
            <hr />
            <div class="share_downside">
              <div class="share_downside_link">
                <i class="fa fa-video live-video-icon"></i>
                <span>Live Video</span>
              </div>
              <div class="share_downside_link">
                <i class="fas fa-photo-video photo-video-icon"></i>
                <span>Photo/Video</span>
              </div>
              <div class="share_downside_link">
                <i class="fas fa-grin-alt feeling-icon"></i>
                <span>Feeling/Activity</span>
              </div>
            </div>
          </div>
          <!-- News FEED -->
          <?php include_once('view/posts_view.php');?>

        </div>
      </div>

      <!-- Content Right -->
      <div class="content_right"></div>
    </div>
  </body>
</html>
