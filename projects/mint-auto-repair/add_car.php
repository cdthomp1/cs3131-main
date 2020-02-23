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
        $sql = "SELECT * FROM vehicle WHERE customer_id='" . $_SESSION["userID"] . "'";

        $sth = $db->query($sql);
        $rows = $sth->rowCount();

        if ($rows >= 1) {
            echo "what car are we doing today?";
            echo '<form method="post" action="schedule_type.php">';
            foreach ($sth as $row) {
                echo '<input type="radio" id="' . $row['vehicle_make'] . $row['vehicle_model'] . '" name="cust_vehicle" value="' . $row['vehicle_make'] . '%20' . $row['vehicle_model'] . '">';
                echo '<label for="cust_vehicle">' . $row['vehicle_make'] . ' ' . $row['vehicle_model'] . '</label><br />';
            }
            echo '<button type="submit" class="continue">Continue</button>';
        } else {
            echo "We need to add your car in our system.";
            echo '<form method="post" action="create_car.php">';
            echo '<label for="make">Your Cars Make: </label> <input type="text" name="make" placeholder="Ford"><br />';
            echo '<label for="model">Your Cars Model: </label> <input type="text" name="model" placeholder="Ranger"><br />';
            echo '<label for="color">Your Cars Color: </label> <input type="text" name="color" placeholder="Blue"><br />';
            echo '<label for="licPla">Your Cars License Plate: </label> <input type="text" name="licPla" placeholder="ABC123"><br />';
            echo '<button type="submit" class="continue">Add Car!</button>';
            echo '</form>';
        }
        ?>
</body>

</html>