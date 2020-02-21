<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/user.css">
    <title>Mint Auto Repair</title>
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
    <form action="sucessSignIn.php" style="border:1px solid #ccc" method="post">
  <div class="container">
    <h1>Log In</h1>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    <?php 
      if ($_SESSION["badLogin"] != '') {
        echo $_SESSION["badLogin"];
        $_SESSION["badLogin"] = '';
      }
    ?>
    <div class="clearfix">
    <button type="submit" class="signupbtn">Log In</button>
    </div>
  </div>
</form>
</body>
</html>