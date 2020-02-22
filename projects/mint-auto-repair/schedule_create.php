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
echo 'Vehicle ID: '. $vechID . '<br />';


$appointmentInsert = $db->prepare("INSERT INTO appointment
(appointment_time, appointmet_type, appointment_est_cost, appointment_vehicle_id, appointment_customer_id, appointment_remind_next_apt, appointment_working_tech_id, service_advisor_id, appointment_date)
VALUES (:timeO, :typeO, :cost, :vehicle, :customer, '06-29-2020', :technitian, :serviceA, :dateOf)");

$appointmentInsert->bindParam(':timeO', $time);
$appointmentInsert->bindParam(':typeO', $typeOf);
$appointmentInsert->bindParam(':cost', '300');
$appointmentInsert->bindParam(':vehicle', $vechID);
$appointmentInsert->bindParam(':customer', $custID);
$appointmentInsert->bindParam(':technitian', $techID);
$appointmentInsert->bindParam(':serviceA', $saID);
$appointmentInsert->bindParam(':dateOf', $date);

print_rO($appointmentInsert);


?>