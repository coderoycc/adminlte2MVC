<?php
class ctrUsers{
  static public function ctrShowUsers(){
    $tabla = "users";
    $respuesta = mdlUsers::mdlShowUsers($tabla);

    return $respuesta;
  }

  static public function ctrAddUser(){
    if(isset($_POST['nombre'])){
      $ruta = '';
      if(isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'])){
        // Obtener el tama;o de la imagen
        list($ancho, $alto) = getimagesize($_FILES['imagen']['tmp_name']);
        $newWidth = 480;
        $newHeight = 382;
        $directorio = "views/images/users";

        if($_FILES['imagen']['type'] == "image/jpeg"){
          $aleatorio = mt_rand(100,999);
          $ruta = $directorio."/".$aleatorio.".jpg";
          $origen = imagecreatefromjpeg($_FILES['imagen']['tmp_name']);
          $destino = imagecreatetruecolor($newWidth, $newHeight);
          imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);
          imagejpeg($destino, $ruta);
        }else if($_FILES['imagen']['type'] == "image/jpeg"){
          $aleatorio = mt_rand(100,999);
          $ruta = $directorio."/".$aleatorio.".jpg";
          $origen = imagecreatefrompng($_FILES['imagen']['tmp_name']);
          $destino = imagecreatetruecolor($newWidth, $newHeight);
          imagealphablending($destino, false);
          imagesavealpha($destino, true);
          imagecopyresized($destino, $origen, 0, 0, 0, 0, $newWidth, $newHeight, $ancho, $alto);
          imagepng($destino, $ruta);
        }else{
          echo '
          <script>
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Error en el formato de la imagen",
            showConfirmButton: false,
            timer: 1200
          })
          </script>
          ';
          return;
        }
      }

      $crypPass = crypt($_POST['password'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

      $data = array(
        "nombre" => $_POST['nombre'], 
        "email" => $_POST['email'], 
        "password" => $crypPass, 
        "rol" => $_POST['rol'], 
        "imagen" => $ruta
      );
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      
      $response = mdlUsers::mdlAddUser($data);
      if($response == "ok"){
        echo '
        <script>
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Usuario Agregado correctamente",
            showConfirmButton: false,
            timer: 1200
          })

          setTimeout(function(){
            document.getElementById("form-user").reset();
          },1400);
        </script>
        ';

      }else{
        echo '<div class+"alert alert-danger mt-3 small">Registro fallido</div>';
      }
    }
  }
}
?>