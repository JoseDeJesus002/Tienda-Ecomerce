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
$sql = "SELECT * FROM ventas LIMIT $indiceInicio, $productosPorPagina";
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
<div>
    <ul class="menu">
        <li><a href="main.php">Menu</a></li>
        <li><a href="index.php">Inventario</a></li>
        <li><a href="pedidos.php">Pedido de Unidades</a></li>
        <li><a href="ventaVista.php" class="active">Ventas</a></li>
        <div class="derecha">
            <form action="../login/logout.php" method="post">
                <button class="logout" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </ul>

    <br>
    <br>
    <h1 class="title" align="center">Ventas</h1>
    <!-- Generacion de PDF -->
    <h2 align="center">Generar PDF de ventas</h2>
    <form align="center" action="pdf/pdf-ventas.php" method="post">
        Desde:
        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="desde" id="desde" />
        Hasta:
        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="hasta" id="hasta" />
        <td>
            <input type="submit" value="General PDF" style="padding: 10px; font-size: 10px;"></input>
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
        $sql = "SELECT * FROM ventas WHERE id_venta = '$id' OR nombre = '$id'";
        $query = mysqli_query($con, $sql);
    }
    ?>
    <br><br>
    <table class="table" border="white">
        <thead>
            <tr>
                <th>Id_venta</th>
                <th>Nombre_producto</th>
                <th>Usuario</th>
                <th>Total unidades vendidas</th>
                <th>Total venta</th>
                <th>Descripcion</th>
                <th>Foto del lugar</th>
                <th>Metodo de pago</th>
                <th>Fecha de la venta</th>
                <th>Hora de la venta</th>
                <!-- <th>Editar</th>
                <th>Eliminar</th> -->
            </tr>
        </thead>
        <tbody>
            <br>

            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr class="contenido">
                    <td><?php echo $row['id_venta'] ?></td>
                    <td><?php echo $row['nombre_producto'] ?></td>
                    <td><?php echo $row['usuario'] ?></td>
                    <td><?php echo $row['total_unidades_vendidas'] ?></td>
                    <td><?php echo $row['total_venta'] ?></td>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><img width="100" src="data:image/jpg;base64,<?php echo base64_encode($row['foto_lugar']); ?>" onerror="this.src='../images/predeterminada.png'"></td>
                    <td><?php echo $row['metodo_pago'] ?></td>
                    <td><?php echo $row['fecha_venta'] ?></td>
                    <td><?php echo $row['hora_venta'] ?></td>
                    <td>
                        <input type="checkbox" name="venta_entregada[]" value="<?php echo $row['id_venta']; ?>" <?php echo (isset($_POST['venta_entregada']) && in_array($row['id_venta'], $_POST['venta_entregada'])) ? 'checked' : ''; ?>>
                    </td>
                    <!-- <td><a href="actualizar.php?id=<?php echo $row['id_venta'] ?>">
                            <img src="../images/editar.png" width="30" height="30">
                        </a></td>
                    <td><a href="querys/eliminar.php?id=<?php echo $row['id_venta'] ?>">
                            <img src="../images/eliminar.png" width="30" height="30">
                        </a></td> -->
                </tr>
            <?php
            }
            ?>
        </tbody>
</div>
<div class="pagination" align="center">
    <?php
    // Calcular el número total de páginas
    $totalProductos = mysqli_num_rows(mysqli_query($con, "SELECT * FROM ventas"));
    $totalPaginas = ceil($totalProductos / $productosPorPagina);

    if ($totalPaginas > 1) {
        if ($paginaActual > 1) {
            echo "<a class='pagination' href='ventaVista.php?pagina=" . ($paginaActual - 1) . "'>Anterior</a>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo "<a class='pagination' href='ventaVista.php?pagina=$i'>$i</a>";
        }

        if ($paginaActual < $totalPaginas) {
            echo "<a class='pagination' href='ventaVista.php?pagina=" . ($paginaActual + 1) . "'>Siguiente</a>";
        }
    }
    ?>
</div>
</body>

</html>