<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "webdesignchallenges";
$password = "webdesignchallenges";
$schema = "webdesignchallenges";

$description = $_REQUEST['description'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  $stmt = $conn->prepare("INSERT INTO tableone(description, created) VALUES('$description', '2022-03-14 12:00:00')");
  $result = $stmt->execute();
  print_r($result);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>
