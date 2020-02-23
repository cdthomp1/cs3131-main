<?php session_start();

$_SESSION["loggedIn"] = true;

header("Location: index.php");

?>