<?php 
session_start();
include_once('db_connect.php');
$database = new database();
if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}
if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
    if($database->login($username,$password,$remember))
    {
      header('location:home.php');
    }
    else
    {
      echo "<script>alert('Username atau Password Tidak Sesuai!'); document.location.href = 'login.php';</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <title>Login Form</title>

  <style>
  .login{
    position: absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%, -50%);
    background: lightgoldenrodyellow;
    padding: 20px;
    width: 270px;
    box-shadow: 0 0 10px 5px burlywood;
  }
  .control{
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 5px;
    font-size: 15px;
    background: navajowhite;
    border: white;
    border-radius: 5px;
  }
  .button{
    background: lightsalmon;
    color: white;
    border: white 3px solid;
    border-radius: 5px;
    padding: 12px 20px;
  }
  </style>
</head>
<body>
  <div class="login">
  <h1>Please sign in</h1>
    <form method="post" action="">
        <label for="username">Username</label>
        <br>
        <input class="control" type="text" id="username" placeholder="Username" name="username" required autofocus>
        <br> <br>
        <label for="password">Password</label>
        <br>
        <input class="control" type="password" id="password" placeholder="Password" name="password" required>
        <br> <br>
        <label><input type="checkbox" value="remember-me" name="remember"> Remember me</label>
        <br> <br>
        <button class="button" type="submit" name="login">Sign in</button>
        <button class="button"><a href="register.php" style="text-decoration: none; color :white">Register</a></button>
    </form>
  </div>
</body>
</html>