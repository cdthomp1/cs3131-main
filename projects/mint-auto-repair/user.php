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
    <h1>Welcome to Mint Auto Repair</h1>
    <h2>Please Create an account to get started or sign in.</h2>

    <form action="sucessSignUp.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Sign Up</button>
      <p>Already a Customer? <a href="login.php" >Log In here</a>!</p>
    </div>
  </div>
</form>
</body>
</html>