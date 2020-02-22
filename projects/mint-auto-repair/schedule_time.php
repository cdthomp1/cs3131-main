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

                if ($rows > 1) {
                    echo "PASSED IF STATEMENT";
                    foreach($result as $res) {
                        echo "<p>" . $res["appointment_time"] . "</p>";
                    }
                } else {
                    echo "FAILED IF STATEMENT";

                    echo $result['appointment_date'];                    
                }
    ?>

</body>

</html>