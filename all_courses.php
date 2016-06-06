<?php



require_once 'I_Course_Repo.php';
require_once 'db_course_repos.php';
require_once 'Course.php';

$courseRepo = new \smadduru\finalP\db_course_repos();

$courseList = $courseRepo->getAllCourses();

error_reporting(0);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Course-Ra</title>
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
        table{

            width: 50%;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {

            padding: 5px;
        }
        table#t1 th {
            background-color: blanchedalmond;
            color: black;
        }
        table#t1 tr:nth-child(even) {
            background-color: #EDB9B9;
        }
        table#t1 tr:nth-child(odd) {
            background-color:#BCF0FF;
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
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<p><h1>Courses Registered</h1></p>
<table id="t1" >
    <tr>
        <th>Id</th>
        <p> <th>Full Name</th></p>
        <th>Course Name</th>
        <th>Email</th>
        <th>Phone Number</th>
       
    </tr>
    <?php
    error_reporting(0);
    foreach($courseList as $course) {
        echo '<tr>';
        echo '<td>' . $course->getId() . '</td>';
        echo '<td><a href="view.php?id=' . $course->getId() . '">'. $course->getFullname() .'</a></td>';
        echo '<td>' . $course->getCoursename() . '</td>';
        echo '<td>' . $course->getEmail() . '</td>';
        echo '<td>' . $course->getNumber() . '</td>';
        //echo '<td>' . $note->getDate() . '</td>';
        echo '</tr>';


    }
    ?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>


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



