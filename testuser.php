<LINK rel="stylesheet" href="HojaEstilo.css" type="text/css">
<?php

require("seguridad.php");
require_once('usuario.php');
require_once('header.php');
$new=new usuario();

echo "<div>
    <form class='contact_form' name='usuario' id='usuario' action='testuser.php' method='post'>
        <table>
            <tr><td><label><h4 font color='black'>Nombre(s) :  </h4></label></td><td><input type='text' name='name' placeholder='Nombre' maxlength='30' required pattern='^([A-Z]{1}[a-z]{1,8})|([A-Z]{1}[a-z]{1,8}[\s][a-zA-Z]{1,8})$'><span class='form_hint'>Ejemplo: Pepe</span></td>
            <tr><td><label><h4 font color='black'>Apellido Paterno :  </h4></label></td><td><input type='text' name='apep' placeholder='Apellido Paterno' maxlength='30' required pattern='^[A-Z]{1}[a-z]{1,12}$'><span class='form_hint'>Ejemplo: Morales</span></td>
            <tr><td><label><h4 font color='black'>Apellido Materno :  </h4></label></td><td><input type='text' name='apem'placeholder='Apellido Materno' maxlength='30' required pattern='^[A-Z]{1}[a-z]{1,12}$'><span class='form_hint'>Ejemplo: Mireles</span></td>
            <tr><td><label for='usuario'><h4 font color='black'>Usuario :  </h4></label></td><td><input type='text' name ='usuario' title='Digita tu Nombre de usuario' placeholder='Usuario' maxlength='30' required pattern='^[A-Z]{1}[a-z]{1,8}$'/><span class='form_hint'>Ejemplo Jose</span></td>
            <tr><td><label for='contrasena'><h4 font color='black'>Contraseña :  </h4></label></td><td><input type='password' name='password1' placeholder='********' title='Contraseña de 8 a 10 digitos' placeholder='Ejemplo:1822012985' required pattern='^([a-zA-Z0-9]{8,10})$'/></td>
            <tr><td><label><h4 font color='black'>nivel :  </h4></label></td><td><select  name='nivel'>
                        <option value='1'>Administrador</option>
                        <option value='2'>Alumno</option>
                        <option value='3'>Maestro</option>
                    </select></td>
            </table>
            <br><input type='submit' name='submit' class='btn btn-lg btn-success' value='alta'>
        <br><br>ID<input type='text' name='ids'><input type='submit' class='btn btn-lg btn-success' name='submit' value='delete'>
        <br><br>ID<input type='text' name='idd'><input type='submit' class='btn btn-lg btn-success' name='submit' value='update'>
        <br><br>ID<input type='text' name='id'><input type='submit' class='btn btn-lg btn-success' name='submit' value='consulta'>
        </form>
    </div>";



if(isset($_POST['submit'])){
    switch ($_POST['submit']){


        case "alta";

            echo"<div class=\"alert alert-danger\" role=alert>";
            echo"<br>Registro Guardado Correctamente";
            echo"</div>";

            $name=$_POST['name'];
            $apep=$_POST['apep'];
            $apem=$_POST['apem'];
            $nivel=$_POST['nivel'];
            $usuario=$_POST['usuario'];
            $pasword=$_POST['password1'];

            $new->create($name,$apep,$apem,$usuario,$pasword,$nivel);
            $new->readuG();
            //$new->create("$_POST['name']","$_POST['apep']","$_POST['apem']","$_POST['nivel']");
       break;
        case "delete";

            echo"<div class=\"alert alert-info\" role=alert>";
            echo"<br>Registro Borrado Correctamente";
            echo"</div>";
            $id=$_POST['ids'];

            $new->delete($id);
            $new->readuG();
        //$new->create("$_POST['name']","$_POST['apep']","$_POST['apem']","$_POST['nivel']");
       break;
        case "update";

            echo"<div class=\"alert alert-success\" role=alert>";
            echo"<br>Registro Modificado Correctamente ID=".$_POST['idd'];
            echo"</div>";
            $id=$_POST['idd'];
            $name=$_POST['name'];
            $apep=$_POST['apep'];
            $apem=$_POST['apem'];
            $nivel=$_POST['nivel'];
            $usuario=$_POST['usuario'];
            $pasword=$_POST['password1'];

            $new->update($id,$name,$apep,$apem,$usuario,$pasword,$nivel);
            $new->readuG();
       break;
        case "consulta";
            echo"<div class=\"alert alert-info\" role=alert>";
            echo"<br> A consultado el Registro con ID= ".$_POST['id'];
            echo"</div>";
            $id=$_POST['id'];

            $new->readuS($id);
    }


}




//$new->create('nydia','america','martinez',1);

require('footer.php');
//$new->delete(25);
//$new->update(1);



?>

