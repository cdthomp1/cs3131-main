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
        echo '<h2>Okay '. $_SESSION["name"] . ', what does your ' . $vehicle . ' need?</h2>'; 
    ?>
</body>
</html>