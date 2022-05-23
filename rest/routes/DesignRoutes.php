<?php
// CRUD operations for todos entity

/**
* List all
*/
Flight::route('GET /tableone', function(){
  Flight::json(Flight::designService()->get_all());
});

/**
* List invidiual
*/
Flight::route('GET /tableone/@id', function($id){
  Flight::json(Flight::designService()->get_by_id($id));
});

/**
* add
*/
Flight::route('POST /tableone', function(){
  Flight::json(Flight::designService()->add(Flight::request()->data->getData()));
});

/**
* update
*/
Flight::route('PUT /tableone/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::designService()->update($id, $data));
});

/**
* delete
*/
Flight::route('DELETE /tableone/@id', function($id){
  Flight::designService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
