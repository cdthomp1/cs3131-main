<?php session_start(); ?>
<?php include './dbConnect.php'; ?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">

    <link href="styles/main.css" type="text/css" rel="stylesheet" />
    <link href="styles/calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php include './navbar.php'; ?>

    <h2>Welcome <?php echo $_SESSION["name"] ?><h3>Mint is excited to work with you and your vehicle. Lets begin.</h3>

        <?php
        echo "Add your car in our system.";
        if ($_SESSION["carError"] != '') {
            echo $_SESSION["carError"];
            $_SESSION["carError"] = '';
        }
        echo '<form method="post" action="create_car.php">';
        echo '<label for="make">Your Cars Make: </label> <input type="text" name="make" placeholder="Ford"><br />';
        echo '<label for="model">Your Cars Model: </label> <input type="text" name="model" placeholder="Ranger"><br />';
        echo '<label for="color">Your Cars Color: </label> <input type="text" name="color" placeholder="Blue"><br />';
        echo '<label for="licPla">Your Cars License Plate: </label> <input type="text" name="licPla" placeholder="ABC123"><br />';
        echo '<button type="submit" class="continue">Add Car!</button>';
        echo '</form>';

        ?>
</body>

</html>