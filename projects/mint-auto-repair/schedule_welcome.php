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
        foreach ($sth as $row) {
            echo $row;
        }
    } else {
        echo "We need to add your car in our system.";
    }
    ?>
</body>
</html>
