<?php


require_once 'Course.php';
require_once 'db_course_repos.php';

$courseRepo = new \smadduru\finalP\db_course_repos();


?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

    <?php
       $course = $courseRepo->getCourseById($_POST['id']);
     ?>
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
     <h1>Edit Registered Course</h1>
    <br>
    <br>
    <br>
    <h2>Available Courses</h2>
    <li>Programming</li>
    <li>Web Development</li>
    <li>Scripts</li>
    <li>Database</li>
    <li>Mobile Development</li>
        <form method="post" action="edit.php">
            <input type="hidden" name="courseId" value="<?php echo $_POST['id']; ?>">
            <p><label>Full Name : <input type="text" name="name" value="<?php echo $course->getFullname(); ?>"><span style="color:crimson"> *  </span></label></p><br>
            <p><label>Course Name : <input type="text" name="course" value="<?php echo $course->getCoursename(); ?>"><span style="color:crimson"> *  </span></label></p><br>
            <p><label>Email : <input type="text" name="email" value="<?php echo $course->getEmail(); ?>"><span style="color:crimson"> *  </span></label></p><br>
            <p><label>Phone Number : <input type="text" name="num" value="<?php echo $course->getNumber(); ?>"><span style="color:crimson"> *  </span></label></p><br>


            <input type="submit" value="Click Here to Save">
            <input type="reset" value="Reset">
        </form>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['courseId'])): ?>

    <?php

$courseFullname = isset($_POST['name']) ? trim($_POST['name']) : '';
$courseCoursename = isset($_POST['course']) ? $_POST['course'] : '';
$courseEmail = isset($_POST['email']) ? $_POST['email'] : '';
$courseNumber = isset($_POST['num']) ? $_POST['num'] : '';


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
    <?php if ($formIsValid): ?>
        <?php

        $newCourse = $courseRepo->getCourseById($_POST['courseId']);
        $newCourse->setFullname($courseFullname);
        $newCourse->setCoursename($courseCoursename);
        $newCourse->setEmail($courseEmail);
        $newCourse->setNumber($courseNumber);
        $courseRepo->saveCourse($newCourse);
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Edit</title>
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
        <h1>Course Modified</h1>
        <p><b>Modified at : </b>
        <?php

        date_default_timezone_set('America/Chicago');
        echo "<br>";

        echo date("j M Y - H:i:s A")
        ?>
        <p><a href="all_courses.php">Click here to Registered Courses</a></p>
        </body>
        </html>
    <?php else: ?>
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
        <h1>Edit Registered Course</h1>
        <br>
        <br>
        <br>
         <h2>Available Courses</h2>
    <li>Programming</li>
    <li>Web Development</li>
    <li>Scripts</li>
    <li>Database</li>
    <li>Mobile Development</li>
    <form method="post" action="edit.php">
      <input type="hidden" name="courseId" value="<?php echo $_POST['courseId']; ?>">
        <p><label>Full Name : <input type="text" name="name" placeholder="Enter Full Name" value="<?php echo $courseFullname; ?>"><span style="color:crimson"> * <?php echo $fullnameErr; ?> </span></label></p><br>
            <p><label>Course Name  : <input type="text" name="course" placeholder="Enter Course Name" value="<?php echo $courseCoursename; ?>"><span style="color:crimson"> * <?php echo $courseErr; ?></span></label></p><br>
             <p><label>Email  : <input type="text" name="email" placeholder="Enter Email" value="<?php echo $courseEmail; ?>"><span style="color:crimson"> * <?php echo $emailErr; ?></span></label></p><br>
              <p><label>Phone Number  : <input type="text" name="num" placeholder="Enter Phone Number" value="<?php echo $courseNumber; ?>"><span style="color:crimson"> * </span></label></p><br>

            <input type="submit" value="Click Here to Save">
            <input type="reset" value="Reset">
        </form>
        </body>
        </html>
    <?php endif; ?>


<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Edit</title>
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
                <h1>ExTron<span>     "where learning is FUN"</span></h1>
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
    <br>
    <br>
    <br>


      <h1>No Course selected for Editing</h1>
    <br>
    <br>
    <br>
    <br>
    <br>


      <p><a href="index.php">Back to Registered Courses List</a></p>

<?php endif;?>
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
    </body>
    </html>
