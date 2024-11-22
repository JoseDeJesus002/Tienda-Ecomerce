<?php
include("../almacen/querys/conexion.php");
$con=conectar();
date_default_timezone_set('America/Mexico_City');
//$id=$_POST['id'];
$id_rol=$_POST['id_rol'];
$Nombres=$_POST['nombres'];
$Ap=$_POST['ap'];
$Am=$_POST['am'];
$Edad=$_POST['edad'];
$Usuario=$_POST['usuario'];
$password=$_POST['password'];
$Correo=$_POST['correo'];
if($id_rol!=null||$Nombres!=null||$Ap!=null||$Am!=null||$Edad!=null||$Usuario!=null||$password!=null||$Correo!=null)
{
    $sql="insert into usuarios(id_rol,Nombres,Ap,Am,Edad,Usuario,password,Correo)values('".$id_rol."','".$Nombres."','".$Ap."','".$Am."','".$Edad."','".$Usuario."','".$password."','".$Correo."')";
    mysqli_query($con,$sql);
    if($user=1)
    {
        echo '<script language="javascript">alert("Registrado correctamente");  window.location="login.php"</script>';
    }
}
?>