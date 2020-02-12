<?php
$db = NULL;

try {
  // default Heroku Postgres configuration URL
  $dbUrl = getenv('DATABASE_URL');

  if (!isset($dbUrl) || empty($dbUrl)) {
    // example localhost configuration URL with user: "ta_user", password: "ta_pass"
    // and a database called "scripture_ta"
    $dbUrl = "postgres://ta_user:ta_pass@localhost:5432/scripture_ta";

    // NOTE: It is not great to put this sensitive information right
    // here in a file that gets committed to version control. It's not
    // as bad as putting your Heroku user and password here, but still
    // not ideal.
    
    // It would be better to put your local connection information
    // into an environment variable on your local computer. That way
    // it would work consistently regardless of whether the application
    // were running locally or at heroku.
  }

  // Get the various parts of the DB Connection from the URL
  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  // Create the PDO connection
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex) {
  // If this were in production, you would not want to echo
  // the details of the exception.
  echo "Error connecting to DB. Details: $ex";
  die();
}


if (isset($_GET['id'])) {
  $statement = $db->prepare(
    "SELECT book, chapter, verse, content, id
        FROM Scriptures WHERE id = :id
      ;"
  );
  $statement->bindParam(':id', $_GET['id']);
  // execute the statement
  $executeSuccess = $statement->execute();
}

$topicStatement = $db->query('SELECT name FROM topic order by name asc');
$executeSuccess = $topicStatement->execute();
$topics = $topicStatement->fetchALL(PDO::FETCH_ASSOC);

// convert to array
$scriptureResults = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
​
<!DOCTYPE html>
<html lang="en-US">
​
<head>
  <title>Teach 06</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta charset="utf-8">
​
</head>
​
<body>
  <?php foreach ($scriptureResults as $scripture) {
    echo '<h2>' . $scripture['book'];
    echo ' ' . $scripture['chapter'];
    echo ':' . $scripture['verse'];
    echo '</h2>';
    echo '<br>';
    echo '<p>' . $scripture['content'];
    echo '</p>';
  } ?>

  <form action="scriptureinsert.php" method="POST">
    <input type="text" name="book"/><br>
	<input type="text" name="chapter"/><br>
	<input type="text" name="verse"/><br>
	<textarea name="content"></textarea><br>


  <?php foreach ($topics as $topic) {
    echo '<input type="checkbox" name="'.$topic['name']. '" value="'.$topic['name'].'"><label for="'.$topic['name'].'">'.$topic['name'].'</label>';
  } ?>

  <input type=submit value="Insert the Scripture"/>
  </form>
​
</body>
​
​
</html>