<?php

class projectDao{

  private $conn;

  // CONSTRUCTION OF DAO CLASS
  public function __construct(){
    $servername = "localhost";
    $username = "webdesignchallenges";
    $password = "webdesignchallenges";
    $schema = "webdesignchallenges";
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  // show all things
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM tableone");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM tableone WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  // add thing
  public function add($webdesign){
    $stmt = $this->conn->prepare("INSERT INTO tableone (description, created) VALUES (:description, :created)");
    $stmt->execute($webdesign);
    $webdesign['id'] = $this->conn->lastInsertId();
    return $webdesign;
  }

  // delete thing
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM tableone WHERE id=:id");
    $stmt->bindParam(':id', $id); // SQL injection prevention
    $stmt->execute();
  }

  // update thing
  public function update($webdesign){
    $stmt = $this->conn->prepare("UPDATE tableone SET description=:description, created=:created WHERE id=:id");
    $stmt->execute($webdesign);
    return $webdesign;
  }

}

?>
