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
}
?>