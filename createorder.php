<?php


require_once 'Order.php';
require_once 'db_order_repos.php';
require_once 'I_Order_Repo.php';


$orderTitle = isset($_POST['title']) ? trim($_POST['title']) : '';
$orderQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
$orderFullname = isset($_POST['name']) ? trim($_POST['name']) : '';

//Validate form fields
$formIsValid = true;
$titleErr = '';
$quantityErr = '';
$fullnameErr = '';


if (empty($orderTitle)){
    $formIsValid = false;
    $titleErr = '<span style="color: #f00;">Mandatory Field !</span>';
}
if (empty($orderQuantity)){
    $formIsValid = false;
    $quantityErr = '<span style="color: #f00;">Mandatory Field!</span>';
}

if (empty($orderFullname)){
    $formIsValid = false;
    $fullnameErr = '<span style="color:crimson ;">Required Field</span>';
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Create</title>
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
       $orderRepo = new \smadduru\finalP\db_order_repos();
        $order = new \smadduru\finalP\Order();
        $order->setTitle($orderTitle);
        $order->setQuantity($orderQuantity);
        $order->setFullname($orderFullname);
        $orderRepo->saveOrder($order);
        ?>
        <h1>New Order Created</h1>
        <p>Title : <?php echo $orderTitle; ?></p>
        <p>Quantity: <?php echo $orderQuantity; ?></p><br>
        <p>Customer Name: <?php echo $orderFullname; ?></p><br>

        <p><b>Response submitted at : </b>
            <?php

            date_default_timezone_set('America/Chicago');
            echo "<br>";

            echo date("j M Y - H:i:s A")
            ?>

        <p><a href="createorder.php">Order another Item</a></p>
    <?php else: ?>
        <h2>Available Books</h2>
<br>
        <li>Programming</li>
        <li>Web Development</li>
        <li>Scripts</li>
        <li>Database</li>
        <li>Mobile Development</li>
        <h1>Create New Order</h1>
        <form method="post" action="createorder.php">
          <p>  <label>Book Name : <input type="text" name="title" placeholder="Enter Book Name" value="<?php echo $orderTitle; ?>"><span style="color:crimson"> * </span></label><?php echo $titleErr; ?></p><br>
            <p>  <label>Quantity : <select name="quantity">
                    <?php
                    if (!empty($orderQuantity)) {
                        for($i = 1; $i <= 10; $i++){
                            $selected = '';
                            if ($orderQuantity == $i) {
                                $selected = 'selected';
                            }
                            print "<option $selected>$i</option>";
                        }
                    } else {
                        for($i = 1; $i <= 10; $i++){
                            print "<option>$i</option>";
                        }
                    }
                    ?>
                </select></label><?php print $quantityErr; ?><br></p>
            <p><label>Customer Name : <input type="text" name="name" placeholder="Enter Customer Name" value="<?php print $orderFullname; ?>"><span style="color:crimson"> * <?php echo $fullnameErr; ?> </span></label></p><br>
            <input type="submit" value="Order">
            <input type="reset" value="Reset">
        </form>
    <?php endif; ?>
<?php else: ?>
    <h2>Available Books</h2>
<br>
        <li>Programming</li>
        <li>Web Development</li>
        <li>Scripts</li>
        <li>Database</li>
        <li>Mobile Development</li>
        
    <h1>Create New Order</h1>
    <form method="post" action="createorder.php">
        <p><label>Book Name : <input type="text" name="title" placeholder="Enter Book Name"><span style="color:crimson"> * </span></label></p><br>
        <p><label>Quantity : <select name="quantity">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select></label></p><br>
        <p><label>Customer Name : <input type="text" name="name" placeholder="Enter Customer Name" ><span style="color:crimson"> * </span></label></p><br>
        <input type="submit" value="Order">
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
