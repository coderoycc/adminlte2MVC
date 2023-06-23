<?php
include("./controllers/templateController.php");
include("./controllers/usersController.php");
include("./models/usersModel.php");
// Creamos objeto de la clase TemplateController
$plantilla = new TemplateController();

// Ejecutamos el método para mostrar la vista
$plantilla->ctrTemplate();


// $ruta=$_SERVER['REQUEST_URI'];
// echo "RUTAAAAAAAAAA ".$ruta;
?>