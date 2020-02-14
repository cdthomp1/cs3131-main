<?php

try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

?>

<html>

<head>
    <link href="calendar.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php
    include 'cal.php';

    $calendar = new Calendar();

    echo $calendar->show();
    ?>
    <div class="scheduleForm">
        <form>
            <label for="date">You would like to create an appointment on: </label><input id="date" type="text" name="date"><br />
            <label for="name">What is your name? </label><input id="name" type="text" name="name"></br />
            <label for="time">What time?</label><select id="time" type="time" name="time"><br />
                <label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech"><?php
foreach ($db->query("SELECT * FROM employees WHERE employee_position='technician'") as $row) {
    echo '<option value="'.$row['employee_name'].'"><'. $row['employee_name'].'</option>';
}
?>
            </select>
        </form>
    </div>
    <script src="schedule.js"></script>
</body>

</html>