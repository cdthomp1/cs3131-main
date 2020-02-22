<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php


$date = $_SESSION["date"];
$name = $_SESSION["name"];
$time = $_SESSION["time"];
$tech = $_SESSION["tech"];
$typeOf = $_SESSION["typeOf"];
$vehicle = $_SESSION["vehicle"];
$sa = $_SESSION["sa"];

$custIdSql = "SELECT customer_id FROM customer where customer_name ='" . $name ."'";
$custSql = $db->query($custIdSql);
$resultcustSql = $custSql->fetch(PDO::FETCH_ASSOC);
$custID = $resultcustSql["customer_id"];

$vechIdSql = "SELECT vehicle_id FROM vehicle where customer_id ='" . $custID ."'";
$vechSql = $db->query($vechIdSql);
$result = $vechSql->fetch(PDO::FETCH_ASSOC);
$vechID = $result["vehicle_id"];

$techIdSql = "SELECT employee_id FROM employees where employee_name ='" . $tech ."'";
$techSql = $db->query($techIdSql);
$result = $techSql->fetch(PDO::FETCH_ASSOC);
$techID = $result["employee_id"];

$saIdSql = "SELECT employee_id FROM employees where employee_name ='" . $sa ."'";
$saSql = $db->query($saIdSql);
$result = $saSql->fetch(PDO::FETCH_ASSOC);
$saID = $result["employee_id"];


echo 'Customer ID: '. $custID;
echo 'Tech ID: '. $techID;
echo 'SA ID: '. $saID;
echo 'Vehicle ID: '. $vechID;

?>