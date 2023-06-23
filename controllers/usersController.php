<?php
class ctrUsers{
  static public function ctrShowUsers(){
    $tabla = "users";
    $respuesta = mdlUsers::mdlShowUsers($tabla);

    return $respuesta;
  }
}
?>