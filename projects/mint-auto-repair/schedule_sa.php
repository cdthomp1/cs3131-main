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
    $tech = urldecode($_POST["tech"]);
    $_SESSION["tech"] = $tech;

    ?>
    <div class="container">
    <form method="post" action="schedule_confirm.php">
        <label for="tech">Who would you like to be your Service Writer? </label><select id="sa" name="sa">
            <?php
            foreach ($db->query("SELECT * FROM employees WHERE employee_position='Service Writer'") as $row) {
                echo '<option value="' . $row['employee_name'] . '">' . $row['employee_name'] . '</option>';
            }
            ?>
        </select><br />
        <button type="submit" class="continue">Continue</button>
    </form>
    </div>
</body>

</html>