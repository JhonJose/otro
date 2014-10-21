<?php

require('conexion.php');
require('materia.php');
require('header.php');
$materia=new materia();
$id_maestro= $_POST['idmae'];
$materia->datosmaestro($id_maestro);
$materia->materiasAsignadas($id_maestro);
$materia->asignarmateriaMestro($id_maestro);

require('footer.php');
?>