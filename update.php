<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest(backend)/DAO/projectDAO.class.php");

$id = $_REQUEST['id'];
$description = $_REQUEST['description'];
$created = $_REQUEST['created'];

$dao = new projectDao();
$dao->update($id,$description,$created);

echo "Updated $id";
?>
