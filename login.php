<?php
spl_autoload_register(function ($class)
{include"models/".$class.".php";});
$session = new SessionHandle;

if(isset($_GET['logout']) && $_GET['logout'] == 1){
    $logout = new LogOut();
    $msg = "You are now logged out.";
} elseif ($session->logged_in()) {
    $redirect = new Redirector("index.php");
}

if (isset($_POST['submit'])){
   $login = new LoginUser ($_POST['username'], $_POST['password']);
   $msg = $login->message;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (!empty($msg)) {echo "<p>" . $msg . "</p>";}
?>
    <h2>Please login</h2>
    <form action="" method="post">
        Username:
        <input type="text" name="username" id="username">
        Password:
        <input type="password" name="password" id="password">
        <input type="submit" name ="submit" value="login">
    </form>
</body>
</html>