<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest(backend)/DAO/projectDAO.class.php");

$description = $_REQUEST['description']


$dao = new projectDao();
$results = $dao->add($description);
print_r($results);

?>
