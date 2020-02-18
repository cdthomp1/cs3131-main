<?php session_start(); ?>
<?php include './dbConnect.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
    <style>

    </style>
</head>

<body>

    <div class="hero-image">
        <div class="navBar">
            <div class="companyName">Mint Auto Repair</div>
            <div class="links">

                <?php
                if ($_SESSION["loggedIn"] != true) {
                    echo '<div class="link"><a href="user.php">Login</a></div>';
                } else {
                    echo '<div class="link"><a href="calendar.php">Schedule</a></div>';
                    echo '<div class="link"><a href="prophile.php">Profile</a></div>';
                }
                ?>
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
            <div class="aboutImg"><img class="imgAbout" src="images/aboutImg.jpg"></div>
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
                    echo '<div class="testi">
                    <img class="profile" src="' . $row['employee_picture'] . '">
                    <div>
                        <h2>' . $row['employee_name'] . '</h2>
                        <h4>' . $row['employee_position'] . '</h4>
                    </div>
                </div>';
                }
                ?>
            </div>
            <div class="clientReviews">
                <div class="clientReviewHeader">
                    <h2>Client Reviews</h2>
                </div>
                <div class="clientReviewContainer">
                    <div class="review">
                        <div>
                            <h2>Sammy Johnson</h2>
                            <span style="color: rgb(191, 138, 3)">★★★★★</span>
                            <p>We have had our cars fixed here several times. The price is always comparable and well done!
                                This last time, they fixed my hudbands clutch, but after driving it home he noticed it still
                                wasn’t 100%. They took the car and will fix it again, they warranty their services
                                thankfully. A frustrating situation but the customer service was great! We will continue to
                                use them for our car needs!</p>
                        </div>
                    </div>
                    <div class="review">
                        <div>
                            <h2>Sammy Johnson</h2>
                            <span style="color: rgb(191, 138, 3)">★★★★★</span>
                            <p>We have had our cars fixed here several times. The price is always comparable and well done!
                                This last time, they fixed my hudbands clutch, but after driving it home he noticed it still
                                wasn’t 100%. They took the car and will fix it again, they warranty their services
                                thankfully. A frustrating situation but the customer service was great! We will continue to
                                use them for our car needs!</p>
                        </div>
                    </div>
                    <div class="review">
                        <div>
                            <h2>Sammy Johnson</h2>
                            <span style="color: rgb(191, 138, 3)">★★★★★</span>
                            <p>We have had our cars fixed here several times. The price is always comparable and well done!
                                This last time, they fixed my hudbands clutch, but after driving it home he noticed it still
                                wasn’t 100%. They took the car and will fix it again, they warranty their services
                                thankfully. A frustrating situation but the customer service was great! We will continue to
                                use them for our car needs!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div id="copyRight"></div>
                <div>
                    <p>Mechanic</p>
                </div>
                <div>
                    <p>Scranton, PA</p>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/script.js"></script>
</body>

</html>