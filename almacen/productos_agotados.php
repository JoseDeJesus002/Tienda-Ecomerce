<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ../login/login.php');
  exit();
}
include("querys/conexion.php");
$con = conectar();
// Configuración de la paginación
$productosPorPagina = 3; // Cantidad de productos por página
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual
$indiceInicio = ($paginaActual - 1) * $productosPorPagina; // Índice de inicio de resultados

// Consulta SQL paginada
$sql = "SELECT * FROM productos_agotados WHERE cantidad <= 0 LIMIT $indiceInicio, $productosPorPagina";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style_productos_agotados.css">
	<link rel="stylesheet" type="text/css" href="css/style_menu.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Productos Agotados</title>
  </head>
<div>
	<input type="button" value="Regresar" onclick="location.href='index.php'">
	<br><br><br>
	<h1 class="title"align="center">Productos agotados</h1>
	<form action="index.php" method="post">
		<div align="center">
			<label for="search-id"></label>Buscar por ID:
			<input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
			<input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
		</div>
	</form>
	<?php
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM productos_agotados WHERE id_productos = '$id'";
		$query = mysqli_query($con, $sql);
	}
	?>
	<br>
	<table class="table" border="white">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Imagen</th>
				<th>Fecha de salida</th>
				<th>Hora de salida</th>
				<th>Actualizar</th>
				<th>Eliminar</th>
			</tr>

		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_array($query)) {


			?>
				<tr class="contenido">
					<td><?php echo $row['id_productos'] ?></td>
					<td><?php echo $row['nombre'] ?></td>
					<td><?php echo $row['cantidad'] ?></td>
					<td><?php echo $row['precio'] ?></td>
					<td><img width="100"src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"></td>
					<td><?php echo $row['fecha_ingreso'] ?></td>
					<td><?php echo $row['hora_ingreso'] ?></td>
					<td><a href="actualizar_productosAgotados.php?id=<?php echo $row['id_productos'] ?>">
							<img src="../images/editar.png" width="30" height="30">
						</a></td>
					<td><a href="querys/eliminar_productos_agotados.php?id=<?php echo $row['id_productos'] ?>">
							<img src="../images/eliminar.png" width="30" height="30">
						</a></td>
				</tr>

			<?php
			}
			?>
		</tbody>
</div>
    <!-- Controles de paginación -->
    <div class="pagination" align="center">
      <?php
      // Calcular el número total de páginas
      $totalProductos = mysqli_num_rows(mysqli_query($con, "SELECT * FROM productos"));
      $totalPaginas = ceil($totalProductos / $productosPorPagina);

      if ($totalPaginas > 1) {
        if ($paginaActual > 1) {
          echo "<a class='pagination' href='index.php?pagina=" . ($paginaActual - 1) . "'>Anterior</a>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
          echo "<a class='pagination' href='index.php?pagina=$i'>$i</a>";
        }

        if ($paginaActual < $totalPaginas) {
          echo "<a href='index.php?pagina=" . ($paginaActual + 1) . "'>Siguiente</a>";
        }
      }
      ?>
    </div>
</body>

</html>