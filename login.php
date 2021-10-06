<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login_style.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/utilities.css" />

    <title>DwpUnknown</title>
</head>

<body class="container">
    <div id="login-panel" class="p-4">
        <h3 class="">Log In</h3>
        <form id="form-login" action="login.php" method="post">
            <div class="flex-input">
                <label for="email">Username or Email</label>
                <input type="text" class="form-control" placeholder="" name="email" id="email">
            </div>
            <div class="flex-input">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="" name="password" id="password">
            </div>

            <button class="btn" id="btn-submit" type="submit" value="submit">Submit</button>


        </form>
    </div>
</body>

</html>