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
    <div class="wrapper">
        <div class="scheduleForm">
            <div class="welcome">
                <h2>Welcome <?php echo $_SESSION["name"] ?><h3>Mint is excited to work with you and your vehicle. Lets begin.</h3>
                <?php 
                
                $sql = "SELECT appointment_date FROM appointment where appointment_date > '2020-03-23'";
                
                $sth = $db->query($sql);
                $result = $sth->fetch(PDO::FETCH_ASSOC);

                $rows = $sth->rowCount();

                if ($rows > 1) {
                    echo "PASSED IF STATEMENT";
                    print_r($result);
                    foreach($result as $res) {
                        print_r($res);
                    }
                } else {
                    echo "FAILED IF STATEMENT";

                    echo $result['appointment_date'];                    
                }
                ?>
            </div>
            <div class="dateChooser">
                <h3>Please Select a date for your appointment</h3>
                <?php
                include 'cal.php';
                $calendar = new Calendar();
                echo $calendar->show();
                ?>
                <p id='dateChosen'></p>
            </div>
            <div class="timeChooser"></div>
            <div class="vehicleChooser"></div>
            <div class="techChooser"></div>
            <div class="typChooser"></div>
            <div class="createButton"></div>
        </div>
        <form action="details.php">
            <label for="date">You would like to create an appointment on: </label><input id="date" type="text" name="date"><br />
            <?php echo '<label for="name">What is your name? </label><input id="name" value="' . $_SESSION["name"] . '" type="text" name="name"></br />' ?>
            <label for="time">What time?</label><input id="time" type="time" name="time"><br />
            <label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech">
                <?php
                foreach ($db->query("SELECT * FROM vehicle WHERE customer_id=1") as $row) {
                    echo '<option value="' . $row['vehicle_id'] . '">' . $row['vehicle_make'] . ' ' . $row['vehicle_model'] . '</option>';
                }
                ?>
            </select><br />

            <label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech">
                <?php
                foreach ($db->query("SELECT * FROM employees WHERE employee_position='Technician'") as $row) {
                    echo '<option value="' . $row['employee_name'] . '">' . $row['employee_name'] . '</option>';
                }
                ?>
            </select><br />
            <label for="typeOf">What Type of Appointment do you need?</label><select id="typeOf" name="typeOf">
                <option value="Oil Change">Oil Change</option>
                <option value="Tire Rotaion">Tire Rotation</option>
                <option value="Brakes">Brakes</option>
                <option value="Alignment">Alignment</option>
                <option value="Coolant Flush">Coolant Flush</option>
                <option value="Wash">Wash</option>
            </select><br />
            <button type="submit">Create Appointment!</button>
        </form>
    </div>
    <div id="calendar">

    </div>

    <script src="scripts/schedule.js"></script>
</body>

</html>