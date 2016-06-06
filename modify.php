<?php


require_once 'Order.php';
require_once 'db_order_repos.php';

$orderRepo = new \smadduru\finalP\db_order_repos();

?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

    <?php
    $order = $orderRepo->getOrderById($_POST['id']);
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
          <h2>Available Books</h2>
    <li>Programming</li>
    <li>Web Development</li>
    <li>Scripts</li>
    <li>Database</li>
    <li>Mobile Development</li>
    <h1>Modify Order</h1>
     <br>
    <br>
    <br>
        <form method="post" action="modify.php">
            <input type="hidden" name="orderId" value="<?php echo $_POST['id']; ?>">
            <p><label>Book Name : <input type="text" name="title" value="<?php echo $order->getTitle(); ?>"></label>  </p><br>
              <p><label>Quantity : <select name="quantity">
                    <?php
                    $orderQuantity = $order->getQuantity();
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
                </select></label>  </p><br>
            <p><label>Customer Name : <input type="text" name="name" value="<?php echo $order->getFullname(); ?>"><span style="color:crimson"> *  </span></label></p><br>
            <input type="submit" value="Order">
            <input type="reset" value="Reset">
        </form>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['orderId'])): ?>

    <?php

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
        $quantityErr = '<span style="color: #f00;">Mandatory Field !</span>';
    }
    ?>
    <?php if ($formIsValid): ?>
        <?php

        $aOrder = $orderRepo->getOrderById($_POST['orderId']);
        $aOrder->setTitle($orderTitle);
        $aOrder->setQuantity($orderQuantity);
        $aOrder->setFullname($orderFullname);

        $orderRepo->saveOrder($aOrder);
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
     <head>
    <meta charset="UTF-8" />
    <title>Modify</title>
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
        <h1>Order Modified</h1>
         <p><b>Modified at : </b>
        <?php
        date_default_timezone_set('America/Chicago');
        echo "<br>";
        echo date("j M Y - H:i:s A")
        ?>
        <p><a href="all_orders.php">Back to All Orders</a></p>
        </body>
        </html>
    <?php else: ?>
        <!doctype html>
        <html lang="en">
            <head>
    <meta charset="UTF-8" />
    <title>Modify</title>
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
            <h1>COurse-Ra<span>     "where learning is FUN"</span></h1>
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
        <h1>Modify Order</h1>
        <br>
        <br>
        <br>
        <h2>Available Books</h2>
    <li>Programming</li>
    <li>Web Development</li>
    <li>Scripts</li>
    <li>Database</li>
    <li>Mobile Development</li>
        <form method="post" action="modify.php">
            <input type="hidden" name="orderId" value="<?php print $_POST['orderId']; ?>">
          <p>  <label>Book Name : <input type="text" name="title" value="<?php echo $orderTitle; ?>"></label><?php print $titleErr; ?></p><br>
            <p><label>Quantity : <select name="quantity">
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
                </select></label><p><br>
             <p><label>Customer Name : <input type="text" name="name" placeholder="Enter Customer Name" value="<?php echo $orderFullname; ?>"><span style="color:crimson"> * <?php echo $fullnameErr; ?> </span></label></p><br>
            <input type="submit" value="Order">
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
    <title>Modify</title>
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
    <br>
    <br>
    <br>

      <h1>No Order Selected to Modify</h1>
      <br>
    <br>
    <br>
    <br>
    <br>

      <p><a href="all_orders.php">Back to All Orders</a></p>


<?php endif;?>
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
