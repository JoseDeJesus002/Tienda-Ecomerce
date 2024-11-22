<?php
include("conexion.php");
$con=conectar();
date_default_timezone_set('America/Mexico_City');
$id_productos=$_POST['id_productos'];
$nombre=$_POST['nombre'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$fecha_ingreso= date("y/m/d");
$hora_ingreso= date('h:i:s');
if($id_productos!=null||$nombre!=null||$cantidad!=null||$precio!=null||$imagen!=null||$fecha_ingreso!=null||$hora_ingreso!=null)
{
	$sql="insert into productos(id_productos,nombre,cantidad,precio,categoria,imagen,fecha_ingreso,hora_ingreso)values('".$id_productos."', '".$nombre."','".$cantidad."','".$precio."','".$categoria."','".$imagen."','".$fecha_ingreso."','".$hora_ingreso."')";
	mysqli_query($con,$sql);
	if($user=1)
	{
		header("location:../index.php");
	}
}
?>