<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK rel="stylesheet" href="HojaEstilo.css" type="text/css">

<?php
require'header1.php';
?>
<!-- Fixed navbar -->


<center>
<fieldset>
    <legend><h1>Sistema</h1></legend>
    <form class="contact_form" name="forma" id="forma" class="usuario" action="valida.php" method="GET">
        <table width="775" border="0" cellpadding="0" cellspacing="0">
            <tr><td align='right'><label for="usuario"><h1 font color="black">Usuario :  </h1></label></td>
                <td><input type='text' name ='usuario' title='Digita tu Nombre de usuario' placeholder='Login' maxlength="30" required pattern="^[A-Z]{1}[a-z]{1,8}$"/>
            <span class="form_hint">Ejemplo Jose</span></td></tr>
            <tr><td align='right'><label for="contrasena"><h1 font color="black">Contraseña :  </h1></label></td>
                <td><input type="password" name='password1' placeholder='********' title='Contraseña de 8 a 10 digitos' placeholder='Ejemplo:1822012985' required pattern="^([a-zA-Z0-9]{8,10})$"/></td>
            </tr>
            <tr><td><td colspan=2><input type='submit' class="btn btn-lg btn-success" value='Entrar'></td></td></tr>
        </table>
    </form>
</fieldset>
</center>
<?php
error_reporting(0);
$msg=$_GET['msg'];
if($msg!=1)
{
    echo $msg;
}else{
    echo"<font color='red'><h3 align='center'>Session terminada</h3></font>";
}
?>
<!-- Bootstrap core JavaScript
================================================== -->


