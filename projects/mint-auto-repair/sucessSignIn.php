<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php
  $_SESSION["email"] = $_GET["email"];
  $_SESSION["name"] = $_GET["name"];
  $_SESSION["pass"] = $_GET["psw"];
  $_SESSION["loggedIn"] = true;

  if ($_GET["remember"] == "on") {
      $_SESSION["rememberMe"] = true;
  } else {
    $_SESSION["rememberMe"] = false;
  }


  $sql = "SELECT exists (SELECT 1 FROM customer WHERE customer_email = '".$_SESSION["email"]."' and customer_password = '".$_SESSION["pass"]."' LIMIT 1);";
  echo $sql . "<br>";

  $ret = pg_query($db, $sql);
     if(!$ret){
        echo pg_last_error($db);
        exit;
     }
  $bool = pg_fetch_row($ret);
  echo $bool['0'] . "<br>";
  if($bool['0'] === "t"){
          echo "Login Successful";

  }else{
          $errors = $errors . "Passwords do not match. Please try again. <br>";
  }


?>



<!-- <?php header("Location: index.php"); ?> -->