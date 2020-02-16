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

  $userLoginStatement = $db->prepare('SELECT 1 FROM customer WHERE customer_email = :email and customer_password = :psw LIMIT 1');
  $userLoginStatement->bindParam(':email', $_SESSION["email"]);
  $userLoginStatement->bindParam(':psw', $_SESSION["pass"]);




  if($userLoginStatement->execute()) {
    // header("Location: index.php");
    echo "res";
  } else {
    $_SESSION["badLogin"] = '<p style="color: red;">USERNAME OR PASSWORD IS INCORRECT!</p>';
    header("Location: login.php");

  }
?>



