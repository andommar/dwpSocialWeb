<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>
  <div id="container">
    <div class="form-wrap">
      <h1>Sign Up</h1>
      <form>
        <div class="form-group">
          <label for="first-name">First Name</label>
          <input type="text" name="firstName" id="first-name" />
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input type="text" name="lastName" id="last-name" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" />
        </div>
        <div class="form-group">
          <label for="password2">Confirm Password</label>
          <input type="password" name="pasword2" id="password2" />
        </div>
        <button type="submit" class="btn">Sign Up</button>
        <p class="bottom-text">
          By clicking the Sign Up button, you agree to our
          <a href="#">Terms & Conditions</a> and
          <a href="#">Privacy Policy</a>
        </p>
      </form>
      <footer>
        <p>Already have an account? <a href="#">Login Here</a></p>
      </footer>
    </div>

  </div>
</body>

</html>