<?php

class materia {

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;


    public function createMaestroMateria($maestro_id,$materia_id){
        if($materia_id > 0){
            $insert01="INSERT INTO maestro_materia (id_maestro, id_materia)
            values ('$maestro_id','$materia_id')";
            $execute= mysql_query($insert01) or die ("Error al insertar $insert01");

        }
    }
    public function deletemaestromateria($maestro_id,$materia_id){
        if($materia_id > 0){
            $delete01= "DELETE FROM maestro_materia WHERE id_maestro=$maestro_id AND id_materia=$materia_id";
            $delete02= mysql_query($delete01) or die ("Error al eliminar $delete01");
            return;
        }
    }
    public function SeleccionaMaestro(){

        echo"<div class=table-responsive>";
        echo"<form action='ajax.php' method='post' name=maestro id='maestro' target='_self'>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td>Maestro:</td><td><select name=idmae>";
        $sql2="SELECT * FROM usuario WHERE Estatus=1 AND Nivel = 3 ORDER BY ApellidoPaterno ";
        $result2=mysql_query($sql2) or die (mysql_error($sql2));
        while($field= mysql_fetch_array($result2)){
            $id_maestro = $field['Id'];
            $opcion = utf8_decode($field['Id'].") ".$field['Nombre']." ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']);
            echo"<option value=$id_maestro>$opcion</option>";
        }
        echo"</select></td></tr>";
        echo"<tr><td colspan='2' align='center'>
        <input type='submit' class='btn btn-lg btn-success' id='submit' value='Seleccionar'></td></tr>";
        echo"</table>";
        echo"</form>";
        echo"</div>";
    }
    public function datosmaestro($id_maestro){

        echo "<a href='javascript:history.back()'>Regresar</a>";
        $sql4="SELECT * FROM usuario WHERE Id = $id_maestro";
        $result04=mysql_query($sql4) or die ("Error en la consulta $sql4");
        $existe=mysql_num_rows($result04);
        if($existe > 0) {
            $nombre=$id_maestro.") ";
            $nombre.=mysql_result($result04,0,'ApellidoPaterno');
            $nombre.= " ".mysql_result($result04,0,'ApellidoMaterno');
            $nombre.= " ".mysql_result($result04,0,'Nombre');
            $nombre= utf8_decode($nombre);
            echo"<br> Maestro Seleccionado: <strong>".$nombre."</strong>";
        }
    }
    public function materiasAsignadas($id_maestro){
         echo"<div class=table-responsive> ";
          echo"<table class=\"table table-striped\">";
         echo"<tr><td colspan='2' align='center'><strong>Materias Asignadas</strong></td>";
        $sql01="SELECT * FROM maestro_materia WHERE Id_maestro= $id_maestro";
       $result01=mysql_query($sql01) or die ("la consulta es incorrecta $sql01");
          while($field =mysql_fetch_array($result01)){
             $id = $field['Id_materia'];
              $sql04 ="SELECT * FROM materia WHERE idmateria=$id ORDER BY nombre";
                $result04= mysql_query($sql04) or die ("No se ejecuta la consulta $sql04");
                 $nombre = utf8_encode(mysql_result($result04,0,'nombre'));
              echo"<tr><td>$nombre</td><td><a href='testmateria.php?accion=2&maestro=$id_maestro&materia=$id'><input type='submit' name='submit' class='btn btn-xs btn-danger' value='Eliminar'></a></td></tr>";

           }echo"</tr></table></div>";
   }
    public function asignarmateriaMestro($id_maestro){
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\">";
        echo"<form action='testmateria.php' method='POST' id='materias'>";
        echo"<tr><td colspan='2' align='center'><strong>Asignar nuevas Materias</strong></td>";
        echo"<tr><td>Materias: </td><td><select id='materia' name='materia'>";
        $sql01= "SELECT * FROM materia WHERE status= 1 ORDER BY nombre ASC";
        $result01= mysql_query($sql01) or die ("Error $sql01");
        while($field= mysql_fetch_array($result01)){
            $Id_materia= $field['idmateria'];
            $opcion= utf8_encode($field['nombre']);
            $sql03="SELECT * FROM maestro_materia WHERE Id_maestro=$id_maestro AND Id_materia= $Id_materia";
            $result03=mysql_query($sql03) or die("No se ejecuta la consulta $sql03");
            $exite= mysql_num_rows($result03);
            if($exite > 0){
                echo"<option value=0>No disponible</option>";
            }else{
                echo"<option value=$Id_materia>$opcion</option>";
            }

        }
        echo"</select></td></tr>";
        echo"<input type=hidden id=accion name=accion value=1>";
        echo"<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo"<tr><td colspan='2' aling=center><input type='submit' class='btn btn-lg btn-success' value='Agregar'></td></tr>";
        echo"</form></table></div>";

    }

}
?>