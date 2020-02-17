<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php
  $_SESSION["email"] = $_GET["email"];
  //$_SESSION["name"] = $_GET["name"];
  $_SESSION["pass"] = $_GET["psw"];
  $_SESSION["loggedIn"] = true;


  $loggedInEmail = $_GET["email"];
  //$_SESSION["name"] = $_GET["name"];
  $loggedInPassword = $_GET["psw"];


  if ($_GET["remember"] == "on") {
      $_SESSION["rememberMe"] = true;
  } else {
    $_SESSION["rememberMe"] = false;
  }



  echo 'SELECT customer_id, customer_name, customer_email FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'";

echo $db->query('SELECT customer_id, customer_name, customer_email, customer_password FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'");

  foreach ($db->query('SELECT customer_id, customer_name, customer_email, customer_password FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'") as $row) {
    if ($row["customer_email"] == $loggedInEmail && $row["customer_password"]) {
      echo $row["customer_name"];
    } else {
      echo '<p>FAILED LOGIN</p>';
    }
}



/*   if($res == 1) {
    // header("Location: index.php");
    echo "res";
  } else {
    $_SESSION["badLogin"] = '<p style="color: red;">USERNAME OR PASSWORD IS INCORRECT!</p>';
    //header("Location: login.php");

  } */
?>



