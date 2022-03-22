<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../vendor/autoload.php';

Flight::route('/', function (){
  echo "Hello there";
});

Flight::route('/mustafa', function (){
  echo "Hello there Mustafa";
});

Flight::route('/maca', function (){
  echo "Hello there Maco";
});

Flight::start();

 ?>
