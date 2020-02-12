<?php
$dbUrl = getenv('DATABASE_URL');

// Names of tables for this assignment
// scripture
// scripture_links (This table has the many to many relationship)
// topic
$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
//$names = $_POST[''];
$content = $_POST['content'];
$names = $_POST['topics'];

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

$scriptureInsert = $db->prepare('INSERT INTO scriptures (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
$scriptureInsert->bindParam(':book', $book);
$scriptureInsert->bindParam(':chapter', $chapter);
$scriptureInsert->bindParam(':verse', $verse);
$scriptureInsert->bindParam(':content', $content);
$executeSuccess = $scriptureInsert->execute();

foreach ($names as $name) {
$topicInsert = $db->prepare('INSERT INTO scripture_links (scriptureid, topicid) VALUES (
    (SELECT id FROM scriptures WHERE book = :book and chapter = :chapter and verse = :verse and content = :content),
    (SELECT id FROM topic WHERE name = :name)
)');
$topicInsert->bindParam(':book', $book);
$topicInsert->bindParam(':chapter', $chapter);
$topicInsert->bindParam(':verse', $verse);
$topicInsert->bindParam(':content', $content);
$topicInsert->bindParam(':name', $name);
//$executeSuccess = $topicInsert->execute();
echo print_r($names);
}

$scriptureStatement = $db->query('SELECT s.book, s.chapter, s.verse, s.id
FROM scriptures s
;');


$executeSuccess = $scriptureStatement->execute();
$scriptureResults = $scriptureStatement->fetchALL(PDO::FETCH_ASSOC);








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
</head>
<body>
<header><h1>scripture results</h1></header>

  <ul>
  <?php foreach ($scriptureResults as $key => $value): ?>
     <li>
       <?php echo '"'.$value['book'].' '.$value['chapter'].':'.$value['verse'] . ' - ';?>
       <?php $topicStatement = $db->query('SELECT sl.topicid, t.name from scripture_links sl
        Left Join topic t on t.id = sl.topicid
        Where sl.scriptureid = :id
        ;');
        $topicStatement->bindParam(':id', $value['id']);
        $executeSuccess = $topicStatement->execute();
        $topicResults = $topicStatement->fetchALL(PDO::FETCH_ASSOC);
        $topicString = '';
        foreach ($topicResults as $topic) {
          $topicString.= $topic . ', ';
        }
        $topicString = rtrim($topicString, ", ");
        echo $topicString;
        ?>
      </li>
  <?php endforeach; ?>
  </ul>
    
</body>
</html>