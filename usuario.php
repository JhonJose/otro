<?php
include_once('conexion.php');
class usuario {

    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $telefono;
    private $calle;
    private $numero_externo;
    private $numero_interior;
    private $colonia;
    private $municipio;
    private $estado;
    private $CP;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $status;

    public function create($nombre,$apellidop,$apellidom,$usuario,$pasword,$nivel){

        $insert=mysql_query("insert into usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Usuario,Contrasena,Nivel,Estatus)
                                 values ('$nombre','$apellidop','$apellidom','$usuario','$pasword','$nivel',1)") or die (mysql_error());
    }

    public function readuG(){

        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>idusuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tipo</td></tr>";
        $sql=mysql_query("select * from usuario  order by Id asc ") or die (mysql_error());
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['Id'];
            $this->nombre=$field['Nombre'];
            $this->apellido_paterno=$field['ApellidoPaterno'];
            $this->apellido_materno=$field['ApellidoMaterno'];
            $this->nivel=$field['Nivel'];
            switch($this->nivel){
                case 1;
                    $type="Administrador";
                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }
            echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellido_paterno</td><td>$this->apellido_materno</td><td>$type</td></tr>";

        }
        echo"</table></div>";


    }

    public function readuS($id){

        //$idu=mysql_result(mysql_query(" select * from usuario where idusuario=$id"),0,'idusuario');


      $sql=mysql_query("select * from usuario where Id='$id' ") or die (mysql_error());
        echo"<div class='table-responsive'>";
        echo" <table class=\"table table-striped\" >";
        echo"<tr><td>idusuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Tipo</td></tr>";
        while($field= mysql_fetch_array($sql)){
            $this->id=$field['Id'];
            $this->nombre=$field['Nombre'];
            $this->apellido_paterno=$field['ApellidoPaterno'];
            $this->apellido_materno=$field['ApellidoMaterno'];
            $this->nivel=$field['Nivel'];

            switch($this->nivel){
               case 1;
                    $type="Administrador";

                    break;
                case 2;
                    $type="alumno";
                    break;
                case 3;
                    $type="maestro";
                    break;
            }

        }

        echo"<tr><td>$this->id</td><td>$this->nombre</td><td>$this->apellido_paterno</td><td>$this->apellido_materno</td><td>$type</td></tr>";
        echo"</table></div>";

    }

    public function delete($id){

        $delete=mysql_query("delete from usuario where Id='$id' ");


    }


    public function update($id,$name,$apep,$apem,$nivel,$usuario,$pasword){


        $update=mysql_query("UPDATE usuario SET Nombre='$name',ApellidoPaterno='$apep',ApellidoMaterno='$apem',Nivel=$nivel, Usuario='$usuario',Contrasena='$pasword' WHERE Id = $id");

    }
public  function validar($nom,$psw)
{

    $band=0;

    if ($nom=='' or $psw=='')
    {
        $msg='Llenar todos los campos';
        $band=1;
        header ("location:index.php?msg=$msg");
        exit;
    }

    if ($band==0)
    {


        $sql="select * from usuario where Usuario like '$nom' and Contrasena like '$psw'";
        $result=mysql_query($sql) or die ("Error en la Consulta $sql");
        $filas=mysql_num_rows($result);
        if ($filas==0)
        {
            $msg="<font color='red'><h1 align='center'>Usuario o Contraseña Incorrectos</h1></font>";
            header("location:index.php?msg=$msg");

        }
        else{
            $id=mysql_result($result,0,'Id');


            header("location:acceso.php?Id=$id");/*?idu=$id*/
            exit;
        }
    }

}
}
?>
