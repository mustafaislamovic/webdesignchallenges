<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../vendor/autoload.php';
// Crud operations for project entity

//list all things
Flight::route('/webdesignchallenges', function (){
  echo "Hello there";
});
//list individual things
$dao = new projectDao();
$webdesignchallenges = $dao->get_all();
print_r($webdesignchallenges)
//add thing

//update thing

//delete thing

Flight::route('/', function (){
  echo "Hello there";
});

Flight::route('/mustafa', function (){
  echo "Hello there Mustafa";
});

Flight::route('/maca/@name', function ($name){
  echo "Hello there Maco". $name;
});

Flight::start();

 ?>
