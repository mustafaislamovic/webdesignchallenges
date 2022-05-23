<?php

// CRUD operations for todos entity

/**
* List all
*/
Flight::route('GET /notes', function(){
  Flight::json(Flight::noteService()->get_all());
});

/**
* List invidiual
*/
Flight::route('GET /notes/@id', function($id){
  Flight::json(Flight::noteService()->get_by_id($id));
});

/**
* List invidiual by id
*/
Flight::route('GET /notes/@id', function($id){
  Flight::json(Flight::designService()->get_designs_by_note_id($id));
});


/**
* add
*/
Flight::route('POST /notes', function(){
  Flight::json(Flight::noteService()->add(Flight::request()->data->getData()));
});

/**
* update
*/
Flight::route('PUT /notes/@id', function($id){
  $data = Flight::request()->data->getData();
  Flight::json(Flight::noteService()->update($id, $data));
});

/**
* delete
*/
Flight::route('DELETE /notes/@id', function($id){
  Flight::noteService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
