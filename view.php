<?php


require_once 'db_course_repos.php';
require_once 'Course.php';

$courseRepo = new \smadduru\finalP\db_course_repos();


$courseId = isset($_GET['id']) ? $_GET['id'] : '';

$course = $courseRepo->getcourseById($courseId);


?>

<?php if ($course): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Signup</title>
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
                <li><a href="login.php?logout=yes">Logout</a></li>

            </ul>
        </div>
</nav>

 <p>Full Name  : <?php echo $course->getFullname(); ?></p>
  <p>Course Name  : <?php echo $course->getCoursename(); ?></p>
  <p>Email  : <?php echo $course->getEmail(); ?></p>
   <p>Phone Number  : <?php echo $course->getNumber(); ?></p>
<p>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $course->getId();?>">
        <input type="submit" value="Edit">
    </form>
</p>
<p>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $course->getId();?>">
        <input type="submit" value="Delete" onclick="return confirm('Please Confirm to Delete !');" >
    </form>
</p>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>No Courses Registered to Show</title>
</head>
<body>
<h1>No Registered Courses Found</h1>
  <a href="index.php">Back to Registered Courses List</a>

<?php endif; ?>

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
</body>
</html>