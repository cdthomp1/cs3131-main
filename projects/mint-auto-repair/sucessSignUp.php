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
$sql = "SELECT * from customer WHERE customer_email ='" . $_SESSION["email"] . "'  limit 1";

$sth = $db->query($sql);
$rows = $sth->rowCount();


if ($rows == 1) {
  echo "Someone Has that email";
  $_SESSION["dupEmail"] = true;
  header("Location: user.php");
} else if (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $_SESSION["email"])) {
  $_SESSION["badEmail"] = true;
  header("Location: user.php");
}

echo "REGEX VALUE" . preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $_SESSION["email"]);

/* 
  $singUpUser = $db->prepare('INSERT INTO customer (customer_name, customer_email, customer_password) VALUES (:cname, :email, :psw)');
  $singUpUser->bindParam(':cname', $_SESSION["name"]);
  $singUpUser->bindParam(':email', $_SESSION["email"]);
  $singUpUser->bindParam(':psw', $_SESSION["pass"]);
  $executeSuccess = $singUpUser->execute(); */

?>



<?php /* header("Location: index.php"); */ ?>