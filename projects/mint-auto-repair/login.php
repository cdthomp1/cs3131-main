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
  <link rel="stylesheet" href="styles/signin.css">
  <title>Mint Auto Repair</title>
</head>

<body>
  <?php include './navbar.php'; ?>
  <form action="sucessSignIn.php" method="post">
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
  <?php include './footer.php'; ?>
  <script src="scripts/script.js"></script>
</body>

</html>