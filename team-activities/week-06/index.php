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

$topicStatement = $db->query('SELECT name FROM topic order by name asc');
$executeSuccess = $topicStatement->execute();
$topics = $topicStatement->fetchALL(PDO::FETCH_ASSOC);

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


  <form action="scriptureinsert.php" method="POST">
   Book: <input type="text" name="book"/><br>
	Chapter: <input type="text" name="chapter"/><br>
	Verse: <input type="text" name="verse"/><br>
	Content: <textarea name="content"></textarea><br>


<?php foreach ($topics as $topic) {
    echo '<input type="checkbox" name="topics[]" value="'.$topic['name'].'"><label for="'.$topic['name'].'">'.$topic['name'].'</label>';
  } ?>

  <input type=submit value="Insert the Scripture"/>
  </form>
​
</body>
​
​
</html>