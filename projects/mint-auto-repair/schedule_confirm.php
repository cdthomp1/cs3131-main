<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="styles/main.css">

  <title>Document</title>
</head>

<body>
<?php include './navbar.php'; ?>
  <?php
      $sa = urldecode($_POST["sa"]);
      $_SESSION["sa"] = $sa;

  $date = $_SESSION["date"];
  $name = $_SESSION["name"];
  $time = $_SESSION["time"];
  $tech = $_SESSION["tech"];
  $typeOf = $_SESSION["typeOf"];
  $vehicle = $_SESSION["vehicle"];
  ?>

  <h2>Congradulations <?php echo $name ?></h2>
  <p>Here are your details about your appointment with <?php echo $tech ?> @ <?php echo $time ?> on <?php echo $date ?> for the <?php echo $typeOf ?> on the <?php echo $vehicle?>!</p>
  <p>Your Service Writer is <?php echo $sa?>. Please arrive 30 minutes early to meet with them.</p>
</body>

</html>