<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign Up</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/login-signup.css" />
</head>

<body>
  <div id="container">
    <div id="signup-form" class="form-wrap">
      <h1>Sign Up</h1>
      <!-- 	
          `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(100) NOT NULL,
          avatar VARCHAR(255) NOT NULL,
          `password` VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL,
          `rank` VARCHAR (255),
          role_name VARCHAR (100) NOT NULL,
      -->
      <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" autocomplete="off" autofocus="autofocus" onfocus="this.select()" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="password2">Confirm Password</label>
          <input type="password" name="pasword2" id="password2" autocomplete="off" />
        </div>
        <div class="terms-margin">
          <input type="checkbox" id="termsofuse" name="termsofuse" value="Bike">
          <label for="termsofuse"> I accept the Terms of Use.</label>
        </div>
        <input type="submit" name="submit" value="Submit">
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

  </div>
</body>

</html>