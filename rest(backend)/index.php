<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'DAO/projectDao.class.php';
require_once '../vendor/autoload.php';
// Crud operations for project entity

//list all things
Flight::route('/tableone', function(){
  $dao = new projectDao();
  $tableone = $dao->get_all();
  print_r($tableone)
});
//list individual things

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
