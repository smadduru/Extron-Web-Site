<?php
session_start();


if (isset($_GET['logout'])) {
  session_destroy();
}


if(isset($_SESSION['user']))
{
    header("Location: app.php");
    exit;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';


$user_valid = 'admin';
$password_valid = '$2y$10$vU.0xv8UUbvJz2e3pjkR6Oh2fCFNAa5UXZwRQQgrSkFWyWyhiRJeq';

if ($username == $user_valid && password_verify($password, $password_valid)) {
    $_SESSION['user'] = $user_valid;
    header("Location: app.php");
      exit;
}
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
<title>Login</title>
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
<link href="index.css" rel="stylesheet" type="text/css" media="screen" />
<style>
p{
color:black;
}
dt{
color: #9F000F;
 font-family:Aharoni;
}
dd{
font-family:Lucida Sans Unicode;
text-align:justify;
color:black;
font-size:13px;
}
</style>
</head>
<body>
<header>
    <div id="header">
        <div id="logo">
            <h1>Course-Ra<span>     "where learning is FUN"</span></h1>
        </div>
    </div>
</header>
<nav>
<div id="wrapper">
<div id="menu">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="library.html">Library</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
             <li><a href="login.php">Login</a></li> 
        </ul>
    </div>
</nav>
    <br>
    <br>
<form action="#" method="POST">
  <p><label>User Name: <input type="text" name="username"> </label></p><br>
    <p><label>Password: <input type="password" name="password"> </label></p><br>
    <input type="submit" value="Login">
    <input type="reset" value="Reset">
</form>
<footer>
  <div class="container_foot">
    <div class="grid_text"> <span>ITM562-01 &copy; 2015 | Privacy Policy | Design by <b>MSCR</b></span> </div>
    <div class="grid_soc">
      <ul class="soc-icon">
        <li><a href="http://www.twitter.com"><img src="images/icon-3.png" alt=""></a></li>
        <li><a href="http://www.youtube.com"><img src="images/icon-2.png" alt=""></a></li>
        <li><a href="http://www.gmail.com"><img src="images/icon-1.png" alt=""></a></li>
        <li><a href="http://www.facebook.com"><img src="images/icon-4.png" alt=""></a></li>
      </ul>
    </div>
  </div>
</footer>
</div>
</body>
</html>
