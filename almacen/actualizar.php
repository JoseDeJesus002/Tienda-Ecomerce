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
<html lang="es">
  <head>
	<link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style_agregar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualizar Producto</title>
  </head>
<body>
		<div>
			<form action="querys/update.php" method="POST" enctype="multipart/form-data">
				<label>Id del producto</label><br>
				<input type="text" name="id_productos" maxlength="11" value="<?php echo $row['id_productos']?>" readonly><br><br>
				<label>Nombre</label><br>
				<input type="text" name="nombre" maxlength="30" value="<?php echo $row['nombre']?>"><br><br>
				<label>Cantidad</label><br>
				<input type="text" name="cantidad" maxlength="11" value="<?php echo $row['cantidad']?>" readonly><br><br>
				<label>Precio</label><br>
				<input type="text" name="precio" maxlength="5" value="<?php echo $row['precio']?>"><br><br>
				<label>Imagen</label><br>
				<img width="100"src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"> <br><br>
				<br><br>
				<label>Fecha de atualizacion</label><br>
				<input type="text" name="fecha_ingreso" value="<?= $fecha?>"readonly><br><br>
				<label>Hora de actualizacion</label><br>
				<input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br><br>
				<label for="categoria">Categoría:</label>
				<select name="categoria" required>
					<?php
					$categorias = "SELECT categorias.id_categoria,categorias.categoria FROM productos INNER JOIN categorias ON categorias.id_categoria = productos.categoria WHERE productos.id_productos = '$id'";
					$resultado=mysqli_query($con,$categorias);

					while ($row = mysqli_fetch_array($resultado)) 
					{
						echo '<option value="'.$row['id_categoria'].'">'.$row['categoria'].'</option>';
					}
					?>
				</select>
				<br><br>
				<input type="submit" name="" value="Actualizar">
				<a href="index.php">REGRESAR</a>
			</form>
		</div>
</body>
</html>