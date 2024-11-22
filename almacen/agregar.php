<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style_agregar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro de producto</title>
  </head>
<body>
		<?php
		include("querys/conexion.php");
			$con = conectar();
			date_default_timezone_set('America/Mexico_City');
			$fecha=date("d/m/Y");
			$hora=date('h:i:s');
		?>
		<br>
		<a href="index.php">Inicio</a>
		<br><br>
		<h1>Registro de producto</h1>
		<div>
			<form action="querys/insertar.php" method="POST" enctype="multipart/form-data">
				<label>Id del producto</label><br>
				<input type="text" name="id_productos" maxlength="11" required><br>

				<label>Nombre</label><br>
				<input type="text" name="nombre" maxlength="30" required><br>
				
				<label>Cantidad</label><br>
				<input type="text" name="cantidad" maxlength="11" required><br>

				<label>Precio</label><br>
				<input type="text" name="precio" maxlength="5" required><br>

				<label for="categoria">Categoría:</label>
				<select name="categoria" required>
				
				<option value="">Selecciona una categoria</option>
				<output label="categorias">
					<?php
					$categoria = "SELECT * FROM categorias";
					$resultado=mysqli_query($con,$categoria);
					while ($row = mysqli_fetch_array($resultado)) 
					{
						echo '<option value="'.$row['id_categoria'].'">'.$row['categoria'].'</option>';
					}
					?>
				</output>
				</select><br>
				
				<label>Imagen</label><br>
				<input type="file" name="imagen" required><br>

				<label>Fecha de registro</label><br>
				<input type="datetime" name="fecha_ingreso" value="<?= $fecha?>" readonly><br>

				<label>Hora de registro</label><br>
				<input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br>

				<input type="submit" name="agregar" value="AGREGAR">

				<a href="index.php">REGRESAR</a>
			</form>
		</div>
	<br><br><br>
</body>
</html>