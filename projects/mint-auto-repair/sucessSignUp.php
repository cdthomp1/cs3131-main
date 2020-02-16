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


  $singUpUser = $db->prepare('INSERT INTO customer (customer_name, customer_email, customer_password) VALUES (:cname, :email, :psw)');
  $singUpUser->bindParam(':cname', $_SESSION["name"]);
  $singUpUser->bindParam(':email', $_SESSION["email"]);
  $singUpUser->bindParam(':psw', $_SESSION["pass"]);
  $executeSuccess = $singUpUser->execute();
  
?>



<?php header("Location: index.php"); ?>