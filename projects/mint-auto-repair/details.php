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


  echo '<p>DATE: '.$date.'</p>';
  echo '<p>NAME: '.$name.'</p>';
  echo '<p>TIME: '.$time.'</p>';
  echo '<p>TECH: '.$tech.'</p>';
  echo '<p>APPOINTMENT TYPE: '.$typeOf.'</p>';
?>
</body>
</html>



