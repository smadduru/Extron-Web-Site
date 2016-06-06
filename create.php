<?php

require_once 'Course.php';
require_once 'db_course_repos.php';
require_once 'I_Course_Repo.php';


$courseFullname = isset($_POST['name']) ? trim($_POST['name']) : '';
$courseCoursename = isset($_POST['course']) ? $_POST['course'] : '';
$courseEmail = isset($_POST['email']) ? $_POST['email'] : '';
$courseNumber = isset($_POST['num']) ? $_POST['num'] : '';
date_default_timezone_set('America/Chicago');
$date = date("j M Y - H:i:s A");


$formIsValid = true;
$fullnameErr = '';
$courseErr = '';
$emailErr = '';



if (empty($courseFullname)){
    $formIsValid = false;
    $fullnameErr = '<span style="color:crimson ;">Required Field</span>';
}
if (empty($courseCoursename)){
    $formIsValid = false;
    $courseErr = '<span style="color:crimson ;">Required Field</span>';
}
if (empty($courseEmail)){
    $formIsValid = false;
    $emailErr = '<span style="color:crimson ;">Required Field</span>';
}
if (empty($courseNumber)){
    $formIsValid = false;

}
?>

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
                <li><a href="login.php">Login</a></li>

            </ul>
        </div>
</nav>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <?php if ($formIsValid): ?>
        <?php
        $courseRepo = new \smadduru\finalP\db_course_repos();
        $course = new \smadduru\finalP\Course();
        $course->setFullname($courseFullname);
        $course->setCoursename($courseCoursename);
        $course->setEmail($courseEmail);
        $course->setNumber($courseNumber);
        $courseRepo->saveCourse($course);
        ?>
        <h1>New Course Registered</h1>
        <p>Full Name  : <?php echo $courseFullname; ?></p>
        <p>Course Name  : <?php echo $courseCoursename; ?></p>
        <p>Email  : <?php echo $courseEmail; ?></p>
        <p>Phone Number  : <?php echo $courseNumber; ?></p>


        <p><b>Response submitted at : </b>
        <?php

        date_default_timezone_set('America/Chicago');
        echo "<br>";

        echo date("j M Y - H:i:s A")
        ?>

       <p><a href="register.php">Register Another User</a></p>

    <?php else: ?>
        <h2>Available Courses</h2>

        <li>Programming</li>
        <li>Web Development</li>
        <li>Scripts</li>
        <li>Database</li>
        <li>Mobile Development</li>
        <h1>Add New Course</h1>
        <br>
        <br>
        <form method="post" action="create.php">
            <p><label>Full Name : <input type="text" name="name" placeholder="Enter Full Name" value="<?php print $courseFullname; ?>"><span style="color:crimson"> * <?php echo $fullnameErr; ?> </span></label></p><br>
            <p><label>Course Name  : <input type="text" name="course" placeholder="Enter Course Name"  value="<?php print $courseCoursename; ?>"><span style="color:crimson"> * <?php echo $courseErr; ?></span></label></p><br>
            <p><label>Email  : <input type="text" name="email" placeholder="Enter Email" value="<?php print $courseEmail; ?>"><span style="color:crimson"> * <?php echo $emailErr; ?></span></label></p><br>
            <p><label>Phone Number  : <input type="text" name="num" placeholder="Enter Phone Number" value="<?php print $courseNumber; ?>"><span style="color:crimson"> * </span></label></p><br>

            <input type="submit" value="Click Here to Save">
            <input type="reset" value="Reset">

        </form>
    <?php endif; ?>
<?php else: ?>
    <h2>Available Courses</h2>
    <li>Programming</li>
    <li>Web Development</li>
    <li>Scripts</li>
    <li>Database</li>
    <li>Mobile Development</li>
    <br>
    <br>
    <h1>Add New Course</h1>
    <br>
    <br>
    <form method="post" action="create.php">

        <p><label>Full Name : <input type="text" name="name" placeholder="Enter Full Name" ><span style="color:crimson"> * </span></label></p><br>
        <p><label>Course Name  : <input type="text" name="course" placeholder="Enter Course Name"  ><span style="color:crimson"> *</span></label></p><br>
        <p><label>Email  : <input type="text" name="email" placeholder="Enter Email" ><span style="color:crimson"> * </span></label></p><br>
        <p><label>Phone Number  : <input type="text" name="num" placeholder="Enter Phone Number" ><span style="color:crimson"> * </span></label></p><br>

        <input type="submit" value="Click Here to Save">
        <input type="reset" value="Reset">



    </form>
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




