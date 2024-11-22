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
$sql = "SELECT * FROM productos WHERE cantidad > 0 LIMIT $indiceInicio, $productosPorPagina";
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
  <title>Productos</title>
</head>

<body>
<div>
  <ul class="menu">
    <li><a href="main.php">Menu</a></li>
    <li><a href="index.php" class="active">Inventario</a></li>
    <li><a href="pedidos.php">Pedido de Unidades</a></li>
    <li><a href="ventaVista.php">Ventas</a></li>
    <li><a href="agregar.php">Registrar productos</a></li>
    <li><a href="productos_agotados.php">Productos agotados</a></li>
    <div class="derecha">
      <form action="../login/logout.php" method="post">
        <button class="logout" type="submit">Cerrar sesión</button>
      </form>
    </div>
  </ul>

  <br>
  <br>
  <h1 class="title" align="center">Inventario</h1>
  <!-- Generacion de PDF -->
  <h2 align="center">Generar Excel entrada de productos</h2>
  <form align="center" action="pdf/pdf-entradas.php" method="post">
    Desde:
    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="desde" id="desde" />
    Hasta:
    <input type="date" value="<?php echo date('Y-m-d'); ?>" name="hasta" id="hasta" />
    <td>
      <input type="submit" value="Generar Excel" style="padding: 10px; font-size: 10px;"></input>
    </td>
    </tr>
  </form>
  <!-- Barra de busquedas -->
  <form action="index.php" method="post">
    <div align="center">
      <label for="search-id"></label>Buscar Producto:
      <input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
      <input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
    </div>
  </form>
  <?php
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE id_productos = '$id' OR nombre = '$id'";
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
  <br><br>
  <table class="table" border="white">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Categoria</th>
        <th>Imagen</th>
        <th>Fecha de registro</th>
        <th>Hora de registro</th>
        <th>Editar</th>
        <th>Agregar Unidades</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <br>

      <?php
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="contenido">
          <td><?php echo $row['id_productos'] ?></td>
          <td><?php echo $row['nombre'] ?></td>
          <td><?php echo $row['cantidad'] ?></td>
          <td><?php echo $row['precio'] ?></td>
          <td><?php echo $row['categoria'] ?></td>
          <td><img width="100" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"></td>
          <td><?php echo $row['fecha_ingreso'] ?></td>
          <td><?php echo $row['hora_ingreso'] ?></td>
          <td><a href="actualizar.php?id=<?php echo $row['id_productos'] ?>">
              <img src="../images/editar.png" width="30" height="30">
            </a></td>
          <td><a href="registro_pedidos.php?id=<?php echo $row['id_productos'] ?>"> <img src="../images/plus.png" width="30" height="30"> </a></td>
          <td><a href="querys/eliminar.php?id=<?php echo $row['id_productos'] ?>">
              <img src="../images/eliminar.png" width="30" height="30">
            </a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
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