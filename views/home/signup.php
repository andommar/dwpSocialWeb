<?php
include_once "../../controller/UserController.php";

if (isset($_POST['submit'])) {
  $username = validate_data($_POST['username']);
  $email = validate_data($_POST['email']);
  $password = validate_data($_POST['password']);
  $avatar = generate_rnd_avatar();
  $c = new UserController();
  $c->registerUser($username, $email, $password, $avatar);
  $msg = $c->msg;
}
function validate_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}
function generate_rnd_avatar()
{
  $rnd_number = rand(1, 8);
  $avatar = 'avatar_' . $rnd_number;
  return $avatar;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign Up</title>
  <!-- Bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../web/css/login-signup.css" />
  <link rel="stylesheet" href="../web/css/messages-styles.css" />
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="signup">
  <!-- with container fluid type the column takes 100% of the height -->
  <div class="container-fluid d-flex flex-column">
    <div class="row">
      <div id="signup-form" class="col col-lg-4 col-md-9 col-sm-12 col-xs-12 mx-auto form-wrap">

        <h1>Sign Up</h1>
        <!-- 	
          `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(100) NOT NULL,
          *avatar VARCHAR(255) NOT NULL,
          `password` VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL,
          *`rank` VARCHAR (255),
          *role_name VARCHAR (100) NOT NULL,
      -->
        <form action="" method="post" onsubmit="return validate();">

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" autocomplete="off" maxlength="30" required="" aria-required="true" autofocus="autofocus" onfocus="this.select()" />
          </div>
          <span class="msg error-message my-2" id="username-error">
            <?php if (!empty($msg["id"]) && !empty($msg["text"]) && $msg["id"] == 'username') {
              echo $msg["text"];
            } ?>
          </span>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" autocomplete="off" required="" aria-required="true" />
          </div>
          <span class="msg error-message my-2" id="email-error">
            <?php if (!empty($msg["id"]) && !empty($msg["text"]) && $msg["id"] == 'email') {
              echo $msg["text"];
            } ?>
          </span>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" maxlength="30" autocomplete="off" required="" aria-required="true" />
          </div>
          <span class="msg error-message my-2" id="password-error"></span>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" id="password2" maxlength="30" autocomplete="off" required="" aria-required="true" />
          </div>
          <span class="msg error-message my-2" id="password2-error"></span>
          <div class="terms-margin">
            <!-- required="" aria-required="true" -->
            <input type="checkbox" id="termsofuse" name="termsofuse" class="custom-checkbox">
            <label for="termsofuse"> I accept the Terms of Use.</label>
          </div>
          <span class="msg error-message my-2" id="termsofuse-error"></span>
          <input type="submit" name="submit" value="Submit" onclick="submitButtonClick(event)">
          <p class="bottom-text">
            By continuing, you agree to our
            <a class="purple-color" href="#">Terms & Conditions</a> and
            <a class="purple-color" href="#">Privacy Policy</a>
          </p>
        </form>
        <footer>
          <p>Already have an account? <a class="purple-color" href="login.php">Login Here</a></p>
        </footer>
      </div>
    </div> <!-- container -->
  </div>
  <!-- Validation -->
  <script type="text/javascript" src="js/signup.js"></script>
</body>

</html>