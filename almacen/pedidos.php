<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ../login/login.php');
  exit();
}
include("querys/conexion.php");
$con = conectar();
// Configuración de la paginación
$productosPorPagina = 5; // Cantidad de productos por página
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual
$indiceInicio = ($paginaActual - 1) * $productosPorPagina; // Índice de inicio de resultados

// Consulta SQL paginada
$sql = "SELECT * FROM pedidos LIMIT $indiceInicio, $productosPorPagina";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style_menu.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedidos</title>
  </head>
<div>
<ul class="menu">
    <li><a href="main.php">Menu</a></li>
    <li><a href="index.php">Inventario</a></li>
    <li><a href="pedidos.php" class="active">Pedido de Unidades</a></li>
	<li><a href="ventaVista.php">Ventas</a></li>
    <div class="derecha">
      <form action="../login/logout.php" method="post">
        <button class="logout" type="submit">Cerrar sesión</button>
      </form>
    </div>
</ul>
</div>
<br><br><br>
	<h1 class="title"align="center">Pedidos</h1>
<!-- Generacion de PDF -->
<h2 align="center">Generar Excel entrada de productos</h2>
	<form align="center" action="pdf/pdf-pedidos.php" method="post">
    Desde:
    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="desde" id="desde"/>
    Hasta:
    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="hasta" id="hasta"/>
    <td>
      <input type="submit"value="Generar Excel" style="padding: 10px; font-size: 10px;"></input>
    </td>
    </tr>
    </form>
	<!-- Barra de busquedas -->
	<form action="pedidos.php" method="post">
		<div align="center">
			<label for="search-id"></label>Buscar Pedido:
			<input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
			<input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
		</div>
	</form>
	<?php
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "SELECT * FROM pedidos WHERE id_pedido = '$id'";
		$query = mysqli_query($con, $sql);
	}

	// verificar si hay productos por debajo del stock minimo
	$cant = "SELECT nombre,cantidad FROM productos where cantidad <= 5";
	$querys = mysqli_query($con, $cant);
	//si hay productos por debajo del stock minimo, se mostrara un mensaje

	while ($row = mysqli_fetch_array($querys)) {
		echo "<h3 align='center'>El producto " . $row['nombre'] . " se encuentra por debajo del stock minimo</h3>";
	}

	?>
	<br>
	<table class="table" border="white">
		<thead>
			<tr>
				<th>Id</th>
                <th>Id producto</th>
                <th>Nombre producto</th>
                <th>Cantidad ingresada</th>
                <th>total del pedido</th>
                <th>Fecha de ingreso</th>
                <th>Hora de ingreso</th>
                <th>Editar</th>
                <th>Eliminar</th>
			</tr>
	</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_array($query)) {
			?>
				<tr class="contenido">
					<td><?php echo $row['id_pedido'] ?></td>
					<td><?php echo $row['id_producto'] ?></td>
					<td><?php echo $row['nombre_producto'] ?></td>
					<td><?php echo $row['cantidad_ingreso'] ?></td>
					<td><?php echo $row['total_pedido']?></td>
					<td><?php echo $row['fecha_ingreso'] ?></td>
					<td><?php echo $row['hora_ingreso'] ?></td>
					<td><a href="actualizar.php?id=<?php echo $row['id_producto'] ?>">
					<img src="../images/editar.png" width="30" height="30">
					</a></td>
					<td><a href="querys/eliminar.php?id=<?php echo $row['id_producto']?>">
					<img src="../images/eliminar.png" width="30" height="30">
					</a></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</div>
	<div class="pagination" align="center">
      <?php
      // Calcular el número total de páginas
      $totalProductos = mysqli_num_rows(mysqli_query($con, "SELECT * FROM pedidos"));
      $totalPaginas = ceil($totalProductos / $productosPorPagina);

      if ($totalPaginas > 1) {
        if ($paginaActual > 1) {
          echo "<a class='pagination' href='pedidos.php?pagina=" . ($paginaActual - 1) . "'>Anterior</a>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
          echo "<a class='pagination' href='pedidos.php?pagina=$i'>$i</a>";
        }

        if ($paginaActual < $totalPaginas) {
          echo "<a href='pedidos.php?pagina=" . ($paginaActual + 1) . "'>Siguiente</a>";
        }
      }
      ?>
    </div>
</body>
</html>