<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  $email = $_GET["email"];
  $name = $_GET["name"];
  $pass = $_GET["psw"];

?>

<p>Congradulations <?php $name?></p>
<p>You have successfuly created an account with an email of: <?php echo $email?> and a password of: <?php echo $pass?></p>
</body>
</html>


