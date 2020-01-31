<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="content checkout">
        <div id="checkout-window">
            <div class="mos9">
                <div class="mos9-window">
                    <div class="mos9-window__header">
                        <div class="mos9-window__tools">
                            <a href="#" class="mos9-window__close mos9-button"></a>
                        </div>
                        <div class="mos9-window__title">Shipping Address</div>
                        <div class="mos9-window__tools">
                            <a href="#" class="mos9-window__tool--1 mos9-button"></a>
                            <a href="#" class="mos9-window__tool--2 mos9-button"></a>
                        </div>
                    </div>
                    <div class="mos9-window__content">
                        <h3>Order Placed!</h3>
                        <p>Order will be shiped to: </p>
                        <h4>Order Contents:</h4>
                    </div>
                </div>
            </div>
        </div>


    </div>
  
    <?php
    require_once "scripts.php";
    ?>


</body>

</html>