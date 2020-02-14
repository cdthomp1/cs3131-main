<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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



