<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/main.css">

    <title>Document</title>
</head>
<body>
<div class="navBar">
            <div class="companyName">Mint Auto Repair</div>
            <div class="links_container">
                <div class="links">
                    <?php
                    if ($_SESSION["loggedIn"] != true) {
                        echo '<div class="link"><a href="user.php">Login</a></div>';
                    } else {
                        echo '<div class="link"><a href="calendar.php">Schedule</a></div>';
                        echo '<div class="link"><a href="profile.php">Profile</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
<?php
  $date = $_GET["date"];
  $name = $_GET["name"];
  $time = $_GET["time"];
  $tech = $_GET["tech"];
  $typeOf = $_GET["typeOf"];
?>

<h2>Congradulations <?php $name?></h2>
<p>You have successfuly created an appointment with <?php echo $tech?> @ <?php echo $time?> on <?php echo $date?> for an <?php echo $typeOf?>!</p>
</body>
</html>



