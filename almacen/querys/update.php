<?php
include("conexion.php");
$con = conectar();
date_default_timezone_set('America/Mexico_City');
$id_productos = $_POST['id_productos'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
// $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$categoria = $_POST['categoria'];
$fecha_ingreso = date("y/m/d");
$hora_ingreso = date('h:i:s');


	
	$sql = "UPDATE productos SET id_productos='$id_productos', nombre='$nombre', cantidad='$cantidad', precio='$precio', fecha_ingreso='$fecha_ingreso', hora_ingreso='$hora_ingreso' WHERE id_productos ='$id_productos'";
	mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) > 0) {
		echo '<script language="javascript">alert("Actualizado correctamente");  window.location="../index.php"</script>';
	} else {
		echo '<script language="javascript">alert("Error al actualizar");  window.location="../index.php"</script>';
	}


?>

