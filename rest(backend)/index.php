<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'DAO/projectDao.class.php';
require_once '../vendor/autoload.php';

Flight::register('projectDao', 'projectDao');

// CRUD operations for todos entity

// list all things
Flight::route('GET /tableone', function(){
  Flight::json(Flight::projectDao()->get_all());
});

// list individual thing
Flight::route('GET /tableone/@id', function($id){
  Flight::json(Flight::projectDao()->get_by_id($id));
});

//  add thing
Flight::route('POST /tableone', function(){
  Flight::json(Flight::projectDao()->add(Flight::request()->data->getData()));
});

// update thing
Flight::route('PUT /tableone/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
  Flight::json(Flight::projectDao()->update($data));
});

// delete thing
Flight::route('DELETE /tableone/@id', function($id){
  Flight::projectDao()->delete($id);
  Flight::json(["message" => "deleted"]);
});

Flight::start();
?>
