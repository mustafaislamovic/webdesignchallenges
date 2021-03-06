<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/services/NoteService.class.php';
require_once __DIR__.'/services/DesignService.class.php';

Flight::register('designService', 'DesignService');
Flight::register('noteService', 'NoteService');

Flight::map('error', function(Exception $ex){
    // Handle error
    Flight::json(['message' => $ex->getMessage()], 500);
});

require_once __DIR__.'/routes/DesignRoutes.php';
require_once __DIR__.'/routes/NoteRoutes.php';

Flight::start();
?>
