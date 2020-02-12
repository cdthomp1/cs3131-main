<?php
$dbUrl = getenv('DATABASE_URL');

// Names of tables for this assignment
// scriptures
// scrioture_links (This table has the many to many relationship)
// topic


if (empty($dbUrl)) {
  // This gets us the heroku credentials without revealing credentials in our code
  $dbUrl = exec("heroku config:get DATABASE_URL");
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"], '/');

try {
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  // this line makes PDO give us an exception when there are problems,
  // and can be very helpful in debugging! (But you would likely want
  // to disable it for production environments.)
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  print "<p>error: " . $ex->getMessage() . "</p>\n\n";
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