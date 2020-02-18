<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php
  $_SESSION["email"] = $_POST["email"];
  //$_SESSION["name"] = $_GET["name"];
  $_SESSION["pass"] = $_POST["psw"];
  $_SESSION["loggedIn"] = true;


  $loggedInEmail = $_POST["email"];
  //$_SESSION["name"] = $_GET["name"];
  $loggedInPassword = $_POST["psw"];


  $sql = "SELECT * FROM customer WHERE customer_email='". $loggedInEmail . "' AND customer_password='".$loggedInPassword. "' LIMIT 1";


  $res = $db->query($sql);

  echo gettype($res);

  if ($_GET["remember"] == "on") {
      $_SESSION["rememberMe"] = true;
  } else {
    $_SESSION["rememberMe"] = false;
  }



/*   echo 'SELECT customer_id, customer_name, customer_email FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'"; */

?>



