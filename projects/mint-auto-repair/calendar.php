<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include 'cal.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
<div class="scheduleForm">
    <form>
        <label for="date">You would like to create an appointment on: </label><input id="date" type="text" name="date">
    </form>
</div>
<script src="schedule.js"></script>
</body>
</html>   