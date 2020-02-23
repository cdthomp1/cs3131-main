<?php 

if(isset($_SESSION["loggedIn"])) {
    if ($_SESSION["loggedIn"] == false) {
        header("Location: user.php");
    }
}
?>
