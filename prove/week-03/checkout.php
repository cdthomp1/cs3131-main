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
                        <div id="checkout-form">
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" placeholder="NY">
                            <label for="zip">Zip</label>
                            <input type="text" id="zip" name="zip" placeholder="10001">
                            <button>Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cart-item">
            <?php
            require_once "cart-action.php";
            ?>
        </div>
    </div>
    <?php
    require_once "scripts.php";
    ?>


</body>

</html>