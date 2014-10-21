<?php
$user=$_GET['Id'];
if ($user =='')
{
    $msg="No iniciaste secion";
    echo $user;
    //header("location:index.php?msg=$msg");
    exit;
}
setCookie('Id',$user);
setCookie('acceso',1);
SESSION_start();
$_SESSION['Id']=$user;
$_SESSION['acceso']=1;
print"<meta http-equiv='refresh' content='0;
       url=Prueba.php'>";
exit;

?>