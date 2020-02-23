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
    $date = urldecode($_POST["date"]);
    $_SESSION["date"] = $date;
    
    
    $sql = "SELECT appointment_date, appointment_time FROM appointment where appointment_date = '" . $date . "'";
    
    $sth = $db->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    $times = ['8:00 AM', '8:30 AM', '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM'];
    $takenTime = [];
    
    
    foreach ($result as $res) {
        array_push($takenTime, $res["appointment_time"]);
    }
    
    
    ?>
    <div class="container">
        <h2>Please Select a Time for your Appointment</h2>
    <form method="post" action="schedule_tech.php">

        <?php
        foreach ($times as $time) {
            if (in_array($time, $takenTime)) {
                echo "<label>The ". $time . " spot is already taken &#128533;</label><br />";
            } else {
                echo '<input type="radio" id="' . $time . '" name="time" value="' . $time . '">';
                echo '<label for="time">' . $time . '</label><br />';
            }
        }
        ?>
        <button type="submit" class="continue">Continue</button>
    </form>
    </div>
</body>

</html>