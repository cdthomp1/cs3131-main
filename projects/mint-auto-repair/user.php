<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/user.css">
    <title>Mint Auto Repair</title>
</head>

<body>
    <div class="navBar">
        <div class="companyName"><a href="index.php">Mint Auto Repair</a></div>
        <div class="links_container">
            <div class="links">
                <div class="link"><a href="schedule.html">Schedule</a></div>
                <div class="link"><a href="login.html">Login</a></div>
            </div>
        </div>
    </div>


    <form action="sucessSignUp.php" style="border:1px solid #ccc">
        <div class="container">
            <h1>Welcome to Mint Auto Repair</h1>
            <h2>We are excited to work with you.</h2>
            <h3>Please Create an account to get started or sign in.</h3>
            <hr>
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <?php 
              if ($_SESSION["dupEmail"] == true) {
                echo '<p class="warn">Email Already Used!</p>';
              }
            ?>

            <label for="psw"><b>Password</b></label>
            <p class="passwordNote">You know how strong a password should be, so make it your's. No legnth, number, character requirements.</p>
            <input type="password" placeholder="Enter Password" name="psw" id="passwordOne" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" id="passwordTwo" name="psw-repeat" onchange="matchPassword()" required>
            <p id="passowrdMatch" class="warn"></p>

            <label>
                <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            <br>
            <label>
                <input type="checkbox" name="remember" style="margin-bottom:15px"> You Agree to Our <a href="#" class="terms">Terms & Privacy</a>.
            </label>

            <div class="clearfix">
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
            <p>Already a Customer? <a href="login.php">Log In here</a>!</p>
        </div>
    </form>

    <script src="scripts/script.js"></script>
</body>

</html>