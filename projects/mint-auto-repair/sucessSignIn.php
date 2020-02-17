<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<?php
  $_SESSION["email"] = $_GET["email"];
  //$_SESSION["name"] = $_GET["name"];
  $_SESSION["pass"] = $_GET["psw"];
  $_SESSION["loggedIn"] = true;


  $loggedInEmail = $_GET["email"];
  //$_SESSION["name"] = $_GET["name"];
  $loggedInPassword = $_GET["psw"];


  if ($_GET["remember"] == "on") {
      $_SESSION["rememberMe"] = true;
  } else {
    $_SESSION["rememberMe"] = false;
  }



  $userLoginStatement = $db->query('SELECT FROM customer WHERE customer_email ='."'".$loggedInEmail."'".' and customer_password ='."'".$loggedInPassword."'");

  $executeSuccess = $userLoginStatement->execute();
  $userResults = $userLoginStatement->fetchALL(PDO::FETCH_ASSOC);

  echo $userResults;

foreach ($userResults as $user){
  echo $user;
}



/*   if($res == 1) {
    // header("Location: index.php");
    echo "res";
  } else {
    $_SESSION["badLogin"] = '<p style="color: red;">USERNAME OR PASSWORD IS INCORRECT!</p>';
    //header("Location: login.php");

  } */
?>



