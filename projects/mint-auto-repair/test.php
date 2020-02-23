<?php session_start() ?>

<?php 

$make = urldecode($_POST["make"]);
$model = urldecode($_POST["model"]);
$color = urldecode($_POST["color"]);
$licPla = urldecode($_POST["licPla"]);

echo $make . " " . $model . " " . $color . " " . $licPla . " " . $_SESSION["userID"]


?>