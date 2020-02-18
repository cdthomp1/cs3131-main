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


$sql = "SELECT * FROM customer WHERE customer_email='" . $loggedInEmail . "' AND customer_password='" . $loggedInPassword . "'";



$sth = $db->query($sql);
$rows = $sth->rowCount();



if ($rows == 1) {
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  echo '<p>Welcome '. $result["customer_name"] . "!";

} else {
  $_SESSION["badLogin"] = '<p class="error">USERNAME OR PASSWORD IS INCORRECT!</p>';
  header("Location: login.php");
}


if ($_GET["remember"] == "on") {
  $_SESSION["rememberMe"] = true;
} else {
  $_SESSION["rememberMe"] = false;
}



/*   echo 'SELECT customer_id, customer_name, customer_email FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'"; */

?>



