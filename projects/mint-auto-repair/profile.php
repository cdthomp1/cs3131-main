<?php session_start() ?>
<?php include './dbConnect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
    <link href="styles/profile.css" rel="stylesheet">
</head>

<body>
<div class="navBar">
            <div class="companyName">Mint Auto Repair</div>
            <div class="links_container">
                <div class="links">
                    <?php
                    if ($_SESSION["loggedIn"] != true) {
                        echo '<div class="link"><a href="user.php">Login</a></div>';
                    } else {
                        echo '<div class="link"><a href="calendar.php">Schedule</a></div>';
                        echo '<div class="link"><a href="profile.php">Profile</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <div class="profileContainer">
        <div class="card">
            <div class="card-header">
                <?php echo $_SESSION['name'];?>
            </div>
            <div class="card-body">
                <?php 
                
                $sql = "SELECT a.appointment_id, a.appointment_date, a.appointment_time, a.appointmet_type, v.vehicle_make, v.vehicle_model, e.employee_name AS technician, es.employee_name AS service_advisor
                FROM appointment a 
                    JOIN vehicle v ON a.appointment_vehicle_id = v.vehicle_id  
                    JOIN customer c ON a.appointment_customer_id = c.customer_id 
                    JOIN employees e ON a.appointment_working_tech_id = e.employee_id
                    JOIN employees es ON a.service_advisor_id = es.employee_id
                WHERE c.customer_name = '".$_SESSION["name"]."'";

                $sth = $db->query($sql);

                $result = $sth->fetch(PDO::FETCH_ASSOC);

                echo '<h5 class="card-title">'. $result['appointmet_type'].' on '. $result['appointment_date'].' @ '. $result['appointment_time'].'</h5>';
                echo '<p class="card-text">With '. $result['technician']. ', your technician, for your '. $result['vehicle_make']. ' ' .$result['vehicle_model'] .'. Please arrive 30 minutes early to meet with your service advisor about your service needs. Your advisor is, '.$result['service_advisor'].' </p>';
                ?>
                
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>