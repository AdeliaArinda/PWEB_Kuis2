<?php 
session_start();
if(! isset($_SESSION['is_login']))
{
  header('location:login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>HOME</title>
    <style>
        .button{
            background: lightsalmon;
            color: white;
            border: white 3px solid;
            border-radius: 5px;
            padding: 12px 20px;
        }

    </style>
</head>

<body style="background: lightgoldenrodyellow;">
    <nav>
    <button class="button" style="margin-left: 5%;"><a href="#" style="text-decoration: none; color :black">Home</a></button>
    <button class="button" style="margin-left: 75%;"><a href="logout.php" style="text-decoration: none; color :black">Logout</a></button>
    </nav>
<br>
    <center><h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1></center>
</body>

</html>