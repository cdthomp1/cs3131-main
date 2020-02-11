<?php

try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <style>

    </style>
</head>

<body>

    <div class="hero-image">
        <div class="navBar">
            <div class="companyName">Mint Auto Repair</div>
            <div class="links">
                <div class="link"><a href="schedule.html">Appointments</a></div>
                <div class="link"><a href="login.html">Login</a></div>
            </div>
        </div>
        <div class="hero-text">
            <h1 id="title">Welcome to Mint</h1>
            <p>The freshest service around</p>
        </div>
        <div class="infoBox">
            <div class="box">
                <div class="boxheader">01</div>
                <div class="boxcontent">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae provident voluptatibus,
                        optio, sed hic nobis error magni ipsum reprehenderit voluptates laboriosam iusto eaque magnam
                        vero harum, quo quibusdam quis? Accusamus!</p>
                </div>
            </div>
            <div class="box">
                <div class="boxheader">02</div>
                <div class="boxcontent">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae provident voluptatibus,
                        optio, sed hic nobis error magni ipsum reprehenderit voluptates laboriosam iusto eaque magnam
                        vero harum, quo quibusdam quis? Accusamus!</p>
                </div>
            </div>
            <div class="box">
                <div class="boxheader">03</div>
                <div class="boxcontent">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae provident voluptatibus,
                        optio, sed hic nobis error magni ipsum reprehenderit voluptates laboriosam iusto eaque magnam
                        vero harum, quo quibusdam quis? Accusamus!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="about">
            <div class="aboutImg"><img class="imgAbout" src="./aboutImg.jpg"></div>
            <div class="aboutArticle">
                <h2>About Us</h2>
                <p>Hit the road in your dependable car that get you where you’re going with no worries. Mint Auto Repair has provided Scranton, PA residents with comprehensive auto repairs since 1997. For personalized service and repairs from the experts, now ready to serve your car with premium auto care. We can do everything from suspension repairs to diagnostics. Rely on us when you need any general auto service.</p>
            </div>
        </div>
        <div class="ourStaff">
            <h2>Our Staff</h2>
            <div class="staffContainer">
                <?php
                foreach ($db->query('SELECT * FROM employees') as $row) {
                    echo 'emplpyee: ' . $row['employee_name'];
                    echo '<div class="testi">
                    <img class="profile" src="' . $row['employee_picture'] . '">
                    <div>
                        <h2>' . $row['employee_name'] . '</h2>
                        <h4>' . $row['employee_position'] . '</h4>
                    </div>
                </div>';
                }
                ?>
                <div class="testi">
                    <img src="https://cdthomp1.github.io/images/blCEO.jpg" alt="profile-sample3" class="profile">
                    <div>
                        <h2>Eleanor Crisp</h2>
                        <h4>Lulu Bella Boutique</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
