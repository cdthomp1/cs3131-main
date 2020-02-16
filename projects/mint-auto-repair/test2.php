<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<p>Congradulations <?php echo $_SESSION["name"]?></p>
<p>You have successfuly created an account with an email of: <?php echo $_SESSION["email"]?> and a password of: <?php echo $_SESSION["pass"]?></p>

</body>
</html>


