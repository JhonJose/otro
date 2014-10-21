<?php
require("seguridad.php");
require_once ('conexion.php');
require ('header.php');
require('materia.php');
$materia= new materia();

if(isset($_REQUEST['accion'])){
    $accion= $_REQUEST['accion'];
}else{
    $accion=0;
}
if(isset($_REQUEST['maestro'])){
    $id= $_REQUEST['maestro'];
}else{
    $id=0;
}
if(isset($_REQUEST['materia'])){
    $id_materia= $_REQUEST['materia'];
}else{
    $id_materia=0;
}
switch($accion){
    case 0:
        $materia->SeleccionaMaestro();
    break;
    case 1:
        $materia->createMaestroMateria($id,$id_materia);
        $materia->datosmaestro($id);
        $materia->materiasAsignadas($id);
        $materia->asignarmateriaMestro($id);
    break;
    case 2:
        $materia->deletemaestromateria($id,$id_materia);
        $materia->datosmaestro($id);
        $materia->materiasAsignadas($id);
        $materia->asignarmateriaMestro($id);
}


require('footer.php');
?>