<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

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

  if ('SELECT exists (SELECT 1 FROM customer WHERE customer_email = $_SESSION["email"] and customer_password = $_SESSION["pass"] LIMIT 1);') {
    echo "hello";
  }

?>



<!-- <?php header("Location: index.php"); ?> -->