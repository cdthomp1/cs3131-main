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
<?php
  $_SESSION["email"] = $_GET["email"];
  $_SESSION["name"] = $_GET["name"];
  $_SESSION["pass"] = $_GET["psw"];
  $_SESSION["loggedIn"] = true;

  if ($_GET["remember"] == "on") {
      $_SESSION["rememberMe"] = true;
  } else {
    $_SESSION["rememberMe"] = false;
  }

?>

</body>
</html>


