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
    <?php
    $vehicle = urldecode($_POST["cust_vehicle"]);
    $_SESSION["vehicle"] = $vehicle;
    
    echo '<h2>Okay ' . $_SESSION["name"] . ', what does your ' . $vehicle . ' need?</h2>';
    ?>
    <form method="post" action="schedule_date.php">
        <label for="typeOf">What Type of Appointment do you need?</label><select id="typeOf" name="typeOf">
            <option value="Oil Change">Oil Change</option>
            <option value="Tire Rotaion">Tire Rotation</option>
            <option value="Brakes">Brakes</option>
            <option value="Alignment">Alignment</option>
            <option value="Coolant Flush">Coolant Flush</option>
            <option value="Wash">Wash</option>
        </select>
        <button type="submit" class="continue">Continue</button>
    </form>
</body>

</html>