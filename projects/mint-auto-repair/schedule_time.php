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

                $rows = $sth->rowCount();
                $times = ['8:00 AM', '8:30 AM', '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM'];
                $takenTime = [];

                if ($rows > 1) {
                    echo "PASSED IF STATEMENT";
                    foreach($result as $res) {
                        array_push($takenTime, $res["appointment_time"]);
                    }
                } else {
                    echo "FAILED IF STATEMENT";

                    echo $result['appointment_date'];                    
                }

                foreach($times as $time) {
                    if (in_array($time, $takenTime)) {
                        echo "<p>This spot is taken</p>";
                    } else {
                        echo '<p>$time</p>';
                    }
                }
    ?>

</body>

</html>