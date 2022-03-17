<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Hello ";
require_once("rest(backend)/DAO/projectDAO.class.php");

$dao = new projectDao();
$results = $dao->get_all();
print_r($results);
 ?>
