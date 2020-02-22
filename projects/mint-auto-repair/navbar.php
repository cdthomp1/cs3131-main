<?php session_start(); ?>
<div class="navBar">
        <div class="companyName"><a href="index.php">Mint Auto Repair</a></div>
        <div class="links_container">
            <div class="links">
                <?php
                if ($_SESSION["loggedIn"] != true) {
                    echo '<div class="link"><a href="user.php">Login</a></div>';
                } else {
                    echo '<div class="link"><a href="schedule_welcome.php">Schedule</a></div>';
                    echo '<div class="link"><a href="profile.php">Profile</a></div>';
                }
                ?>
            </div>
        </div>
    </div>