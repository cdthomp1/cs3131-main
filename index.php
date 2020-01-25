<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Home</title>
</head>

<body>
    <div id="particles-js"></div>
    <div id="content">
        <header>
            <a href="index.php"><img src="Dev.png" /></a>
            <h1>Cameron Thompson</h1>
            <h2>Student | Student Software Developer | Thinker</h2>
        </header>
        <article>
            <section>
                <p>A student of Software Engineering. I work hard both in my classes and at my job as a Student Software
                    Developer. I have learned HTML, CSS, JavaScript and I am very perficient in them. I am learning
                    React to increase my abilities as a web developer. I love to take challenging ideas and transform
                    them into beautiful creations.</p>
                <p>When I'm not coding or doing homework, you'll find me with family, playing Ultimate Frisbe or scoring
                    way over par on the Golf course.</p>
                <a class="button" href="assignments.php">Assignemnts</a>
            </section>
        </article>
        <?php echo "<footer><img id=\"footerImg\" src=\"Dev.png\" /><p>Copyright &copy; " . date("Y") . " Cameron Thompson</p><ul class=\"footerLinks\"><li><a href=\"https://www.linkedin.com/in/cameron-thompson96/\" target=\"_blank\" rel=\"noopener noreferrer\">Linkedin</a></li><li><a href=\"https://github.com/cdthomp1\" target=\"_blank\" rel=\"noopener noreferrer\">Github</a></li><li><a href=\"/contact.php\">Contact</a></li></ul></footer>"; ?>
    </div>
    <script src="particles.js"></script>

    <script src="scripts.js"></script>
</body>

</html>