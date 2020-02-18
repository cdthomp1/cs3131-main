<?php session_start(); ?>


<?php
$_SESSION["email"] = $_POST["email"];
//$_SESSION["name"] = $_GET["name"];
$_SESSION["pass"] = $_POST["psw"];
$_SESSION["loggedIn"] = true;

try {
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$loggedInEmail = $_POST["email"];
//$_SESSION["name"] = $_GET["name"];
$loggedInPassword = $_POST["psw"];


$sql = "SELECT * FROM customer WHERE customer_email='" . $loggedInEmail . "' AND customer_password='" . $loggedInPassword . "' LIMIT 1";


$res = pg_query($sql);

echo pg_num_rows($res);

if ($_GET["remember"] == "on") {
  $_SESSION["rememberMe"] = true;
} else {
  $_SESSION["rememberMe"] = false;
}



/*   echo 'SELECT customer_id, customer_name, customer_email FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'"; */

?>



