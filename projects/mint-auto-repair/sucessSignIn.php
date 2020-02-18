<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php
$loggedInEmail = $_POST["email"];
$loggedInPassword = $_POST["psw"];

$sql = "SELECT * FROM customer WHERE customer_email='" . $loggedInEmail . "' AND customer_password='" . $loggedInPassword . "'";

$sth = $db->query($sql);
$rows = $sth->rowCount();

if ($rows == 1) {
  $result = $sth->fetch(PDO::FETCH_ASSOC);
  echo '<p>Welcome ' . $result["customer_name"] . "!";
  $_SESSION["email"] = $result["customer_email"];
  $_SESSION["name"] = $result["customer_name"];
  $_SESSION["loggedIn"] = true;
} else {
  $_SESSION["badLogin"] = '<p class="error">USERNAME OR PASSWORD IS INCORRECT!</p>';
  header("Location: login.php");
}

if ($_POST["remember"] == "on") {
  $_SESSION["rememberMe"] = true;
} else {
  $_SESSION["rememberMe"] = false;
}


?>



