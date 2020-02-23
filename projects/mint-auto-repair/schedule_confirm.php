<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">

  <link href="styles/main.css" type="text/css" rel="stylesheet" />
  <link href="styles/calendar.css" type="text/css" rel="stylesheet" />

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
  <div class="container">
    <h2><?php echo $name ?></h2>
    <p>Here are your details about your appointment with <?php echo $tech ?> @ <?php echo $time ?> on <?php echo $date ?> for the <?php echo $typeOf ?> on the <?php echo $vehicle ?>!</p>
    <p>Your Service Writer is <?php echo $sa ?>. Please arrive 30 minutes early to meet with them.</p>

    <a href="schedule_create.php" class="continue">Looks Great! Create my appointment!</a>
  </div>
</body>

</html>