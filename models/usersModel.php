<?php
require_once("conexion.php");

class mdlUsers{
  static function mdlShowUsers($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt->execute();
    $results = $stmt->fetchAll();
    $stmt->closeCursor();
    return $results;
  }

  static public function mdlAddUser($data){
    $stmt = Conexion::conectar()->prepare("INSERT INTO users(nombre, email, password, foto, rol) VALUES (:nombre, :email, :password, :foto, :rol)");
    $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $data["imagen"], PDO::PARAM_STR);
    $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_INT);
    if($stmt->execute()){
      $stmt->closeCursor();
      return 'ok';
    }
    $stmt->closeCursor();
    return 'error';
  }
}
?>