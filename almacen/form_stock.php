<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
      header('Location: ../login/login.php');
      exit();
    }
	include("querys/conexion.php");
	$con = conectar();

	date_default_timezone_set('America/Mexico_City');
	$fecha=date("d/m/Y");
	$hora=date('h:i:s');
	$id=$_GET['id'];
	$sql = "SELECT * FROM productos WHERE id_productos = '$id'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos Agotados</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-color: #6fb98f;
        }
    </style>
</head>
<div>
    <a href="index.php">Inicio</a>
    <a href="agregar.php">Nuevo Registro</a>
    <h1 align="center">Productos agotados</h1>
    <form action="querys/agregar_stock.php" method="POST">
        <div align="center">
                <input type="text" name="id_productos" maxlength="11" value="<?php echo $row['id_productos']?>"><br><br>
                <label>Cantidad</label><br>
				<input type="text" name="cantidad" maxlength="11"><br><br>
                <input type="submit" name="" value="Actualizar">
        </div>
</form>