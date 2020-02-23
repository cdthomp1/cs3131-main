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
    $time = urldecode($_POST["time"]);
    $_SESSION["time"] = $time;

    ?>
    <div class="container">
    <form method="post" action="schedule_sa.php">
        <label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech">
            <?php
            foreach ($db->query("SELECT * FROM employees WHERE employee_position='Technician'") as $row) {
                echo '<option value="' . $row['employee_name'] . '">' . $row['employee_name'] . '</option>';
            }
            ?>
        </select><br />
        <button type="submit" class="continue">Continue</button>
    </form>
    </div>
</body>

</html>