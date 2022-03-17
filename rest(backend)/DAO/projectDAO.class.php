<?php

class projectDao{
  private $conn;
  // CONSTRUCTOR OF DAO CLASS
  public function __construct(){

    $servername = "localhost";
    $username = "webdesignchallenges";
    $password = "webdesignchallenges";
    $schema = "webdesignchallenges";
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  // METHOD USED TO REAL ALL PROJECT OBJECTS FROM DB
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM tableone;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
  // METHOD USED TO ADD PROJECT TO THE DATABASE
  public function add($description,$created){
    $stmt = $this->conn->prepare("INSERT INTO tableone(description,created) VALUES ('$description', '$created')");
    $stmt->execute();

  }

  // METHOD USED TO DELETE PROJECT RECORDS
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM tableone WHERE id='$id')");
    $stmt->execute();

  }

}

 ?>
