<?php

echo "Hello ";
echo "Mustafa";


$servername = "localhost";
$username = "webdesignchallenges";
$password = "webdesignchallenges";
$schema = "webdesignchallenges";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


 ?>
