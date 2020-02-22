<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php


$date = $_SESSION["date"];
$name = $_SESSION["name"];
$time = $_SESSION["time"];
$tech = $_SESSION["tech"];
$typeOf = $_SESSION["typeOf"];
$vehicle = $_SESSION["vehicle"];

$techIdSql = "SELECT employee_id FROM employees where employee_name ='" . $tech ."'";

$sth = $db->query($techIdSql);

print_r($sth);

?>