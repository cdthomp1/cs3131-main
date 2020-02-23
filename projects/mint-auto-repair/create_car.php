<?php session_start() ?>
<?php include './dbConnect.php'; ?>

<?php 

$make = urldecode($_POST["make"]);
$model = urldecode($_POST["model"]);
$color = urldecode($_POST["color"]);
$licPla = urldecode($_POST["licPla"]);
$uID = $_SESSION["userID"];

echo $make . " " . $model . " " . $color . " " . $licPla . " " . $uID;

$vehicleInstert = $db->prepare('INSERT INTO vehicle (vehicle_make, vehicle_model, vehicle_color, vehicle_license_plate, customer_id) VALUES (:vehicle_make, :vehicle_model, :vehicle_color, :vehicle_license_plate, :customer_id)');

$vehicleInstert->bindParam(':vehicle_make', $make);
$vehicleInstert->bindParam(':vehicle_model', $model);
$vehicleInstert->bindParam(':vehicle_color', $color);
$vehicleInstert->bindParam(':vehicle_license_plate', $licPla);
$vehicleInstert->bindParam(':customer_id', $uID);
$executeSuccess = $vehicleInstert->execute();

if ($executeSuccess) {
    header("Location: schedule_type.php");
} else {
    $_SESSION["carError"] = '<p class="error">AN ERRORR OCCURED, PLEASE TRY AGAIN!</p>';
    header("Location: add_car.php");
}


?>