<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <TITLE>PHP Shopping Cart without Database</TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <h1>Demo Shopping Cart without Database</h1>
    <?php
    require_once "product-gallery.php";
    ?>
    <div class="clear-float"></div>
    <a href="cart.php">Cart</a>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="./home/prove/test/cartAction.js"></script>
</body>

</html>