<?php


require_once 'db_order_repos.php';
require_once 'Order.php';

$orderRepo = new \smadduru\finalP\db_order_repos();

//Shortend Get variable names if set
$orderId = isset($_GET['id']) ? $_GET['id'] : '';

$order = $orderRepo->getOrderById($orderId);

?>

<?php if ($order): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
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

<p>Book Name : <?php echo $order->getTitle();?></p>
<p>Quantity : <?php echo $order->getQuantity();?></p>
<p>Customer Name  : <?php echo $order->getFullname(); ?></p>
<p>
    <form action="modify.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $order->getId();?>">
        <input type="submit" value="Modify Order">

    </form>
</p>
<p>
    <form action="remove.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $order->getId();?>">
        <input type="submit" value="Remove Order">
    </form>
</p>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>No Order To Show</title>
</head>
<body>
<h1>No Order Found</h1>
  <a href="index.php">Back to All Orders</a>


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
