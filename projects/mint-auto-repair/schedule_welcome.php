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
    <div class="container">

    <h2>Welcome <?php echo $_SESSION["name"] ?><h3>Mint is excited to work with you and your vehicle. Lets begin.</h3>

        <?php
        $sql = "SELECT * FROM vehicle WHERE customer_id='" . $_SESSION["userID"] . "'";

        $sth = $db->query($sql);
        $rows = $sth->rowCount();

        if ($rows >= 1) {
            echo "what car are we doing today?";
            echo '<form method="post" action="schedule_type.php">';
            foreach ($sth as $row) {
                echo '<input type="radio" id="'. $row['vehicle_make'] . $row['vehicle_model'] .'" name="cust_vehicle" value="' . $row['vehicle_make'] . '%20'. $row['vehicle_model'] .'">';
                echo '<label for="cust_vehicle">' . $row['vehicle_make'] . ' ' . $row['vehicle_model'] . '</label><br />';
            }
            echo '<button type="submit" class="continue">Continue</button>';
            ?>
            <a href="add_car.php" class="continue">Add a New Car!</a>
            <?php
        } else {
            header("Location: add_car.php");
        }
        ?>

</div>
</body>

</html>