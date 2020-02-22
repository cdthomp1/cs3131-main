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
        $typeOf = urldecode($_POST["typeOf"]);
        $_SESSION["vehicle"] = $typeOf;
    ?>
    <div class="wrapper">
        <div class="scheduleForm">
                <h2>What day would you like to have your <?php echo $_SESSION["vehicle"]?> recive the <?php echo $typeOf?>?</h2>
                    <?php

                    ?>
            </div>
            <div class="dateChooser">
                <h3>Please Select a date for your appointment</h3>
                <?php
                include 'cal.php';
                $calendar = new Calendar();
                echo $calendar->show();
                ?>
        
              

            </div>
        <form method="post" action="schedule_time.php">
            <label for="date">You would like to create an appointment on: </label><input id="dateChosen" type="text" name="date"><br>

            <button type="submit" class="continue">Continue</button>

        </form>
    </div>


    <script src="scripts/schedule.js"></script>
</body>

</html>