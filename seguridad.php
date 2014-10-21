<?php
$idu=$_COOKIE['Id'];
$acceso=$_COOKIE['acceso'];
if($idu=="" or $acceso=="")
{
    print"<meta http-equiv='refresh' content='0;
       url=index.php?msg=1'>";
    exit;
}
session_start();
$idu2=$_SESSION['Id'];
$acceso2=$_SESSION['acceso'];
if($idu2=="" or $acceso2=="")
{
    print"<meta http-equiv='refresh' content='0;
       url=index.php?msg=1'>";
    exit;
}

?>