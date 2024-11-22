<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
  }
	include("querys/conexion.php");
	$con = conectar();

	date_default_timezone_set('America/Mexico_City');
	$fecha=date("Y/m/d");
	$hora=date('h:i:s');
	$id=$_GET['id'];
	$sql = "SELECT * FROM productos WHERE id_productos = '$id'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
    $sql2 = "SELECT * FROM pedidos";
    $query = mysqli_query($con,$sql2);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style_agregar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agregar stock</title>
  </head>
<div>
    <a href="index.php">Inicio</a>
    <h1 align="center">Registrar un Pedido</h1>

    <form action="querys/agregar_stock.php" method="POST">
        <div>
                <input type="text" name="id_pedido" maxlength="11" hidden><br>

                <label>Id del producto</label><br>
                <input type="text" name="id_productos" maxlength="11" value="<?php echo $row['id_productos']?>" readonly><br><br>

                <label>Nombre del producto</label><br>
                <input type="text" name="nombre" maxlength="30" value="<?php echo $row['nombre']?>" readonly><br><br>

                <label>Cantidad</label><br>
				        <input type="text" placeholder="Ingresa la cantidad de unidades" name="cantidad" maxlength="11" required><br><br>

                <label>Total del pedido</label><br>
                <input type="text" placeholder="Ingresa el costo del pedido" name="total" required><br><br>
               
                <label>Fecha de ingreso</label><br>
                <input type="text" name="fecha_ingreso" value="<?= $fecha?>"readonly><br><br>

                <label>Hora de ingreso</label><br>
                <input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br><br>
                <br><br>

                <input type="submit" name="" value="Actualizar">
                <a href="index.php">REGRESAR</a>
        </div>
</form>