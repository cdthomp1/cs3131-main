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


    <div class="header">
        <?php include './navbar.php'; ?>
        <img class="headerImage" src="./images/header-image.jpg">
    </div>
    <div class="main">

        <h1>What Makes Mint Different?</h1>
        <div class="infoBox">
            <div class="box">
                <div class="boxheader">Service</div>
                <div class="boxcontent">
                    <p>Here at Mint Auto, we take care to service your cars with the help they need! We have an advanced diagnostics program that pin points the real issue. No more beating around the bush to find what is truely wrong!</p>
                </div>
            </div>
            <div class="box">
                <div class="boxheader">Knowledge</div>
                <div class="boxcontent">
                    <p>We train our employees to excell in their respective fields. Our Technicians have years of experience. Our Service Managers have taken many courses to know how to best serve you!</p>
                </div>
            </div>
            <div class="box">
                <div class="boxheader">Professional</div>
                <div class="boxcontent">
                    <p>Being professional is key. We take care that our employees will not present you with hidden fees or surprise repairs. What you set up with your service advisor is what you will get. We respect you!</p>
                </div>
            </div>
        </div>
        <div class="about">
            <div class="aboutImg"><img class="imgAbout" src="images/aboutImg.jpg"></div>
            <div class="aboutArticle">
                <div class="aboutHeader">
                    <h2>About Us</h2>
                    <p>Hit the road in your dependable car that get you where you’re going with no worries. Mint Auto
                        Repair
                        has provided Scranton, PA residents with comprehensive auto repairs since 1997. For personalized
                        service and repairs from the experts, now ready to serve your car with premium auto care. We can
                        do
                        everything from suspension repairs to diagnostics. Rely on us when you need any general auto
                        service.</p>
                </div>
            </div>
        </div>


        <div class="ourStaff">
            <h2>Our Staff</h2>
            <div class="staffContainer">
                <?php
                foreach ($db->query('SELECT * FROM employees ORDER BY employee_id ASC') as $row) {
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
        </div>
        <?php include './footer.php'; ?>

        <script src="scripts/script.js"></script>
</body>

</html>