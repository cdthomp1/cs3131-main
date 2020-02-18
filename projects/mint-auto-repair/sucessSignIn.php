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
  /* Exercise PDOStatement::fetch styles */
  print("PDO::FETCH_ASSOC: ");
  print("Return next row as an array indexed by column name\n");
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  print_r($result);
  print("\n");

  print("PDO::FETCH_BOTH: ");
  print("Return next row as an array indexed by both column name and number\n");
  $result = $sth->fetch(PDO::FETCH_BOTH);
  print_r($result);
  print("\n");

  print("PDO::FETCH_LAZY: ");
  print("Return next row as an anonymous object with column names as properties\n");
  $result = $sth->fetch(PDO::FETCH_LAZY);
  print_r($result);
  print("\n");

  print("PDO::FETCH_OBJ: ");
  print("Return next row as an anonymous object with column names as properties\n");
  $result = $sth->fetch(PDO::FETCH_OBJ);
  print $result->name;
  print("\n");
} else {
  header("Location: login.php?error=Username%20or%20password%20incorrect");
}


echo $rows;

if ($_GET["remember"] == "on") {
  $_SESSION["rememberMe"] = true;
} else {
  $_SESSION["rememberMe"] = false;
}



/*   echo 'SELECT customer_id, customer_name, customer_email FROM customer WHERE customer_email='."'".$loggedInEmail."'".' AND customer_password='."'".$loggedInPassword."'"; */

?>



