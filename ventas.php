<?php
session_start();
include("almacen/querys/conexion.php");
$con = conectar();

// Obtenemos los datos del formulario de manera segura
$id_venta = isset($_POST['id_venta']) ? $_POST['id_venta'] : null;
$id_venta = ($id_venta !== null) ? (int)$id_venta : null;
$id_productos = array_map('intval', explode(", ", $_POST['id_productos']));
$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
$totalUnidades = array_map('intval', explode(", ", $_POST['totalUnidades']));
$totalVenta = mysqli_real_escape_string($con, $_POST['total']);
$descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
$imagen_temporal = $_FILES['imagen']['tmp_name'];
$imagen = mysqli_real_escape_string($con, addslashes(file_get_contents($imagen_temporal)));
$pago = mysqli_real_escape_string($con, $_POST['paymentType']);
$fecha_venta = mysqli_real_escape_string($con, $_POST['fecha_venta']);
$hora_venta = mysqli_real_escape_string($con, $_POST['hora_venta']);

// Verificamos que la cantidad de productos a vender no sea mayor que la cantidad disponible en inventario
foreach ($id_productos as $index => $producto_id) {
    $cantidad_venta = $totalUnidades[$index];
    $query = "SELECT cantidad FROM productos WHERE id_productos = $producto_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($cantidad_venta > $row['cantidad']) {
            echo 'Error: La cantidad del producto ' . $producto_id . ' es mayor a la disponible en inventario';
            exit();
        }
    } else {
        echo 'Error en la consulta: ' . mysqli_error($con);
        exit();
    }
}

// Realizamos la inserción en la base de datos y actualizamos el inventario de manera segura
$sql = "INSERT INTO ventas (id_venta, nombre_producto, usuario, total_unidades_vendidas, total_venta, descripcion, foto_lugar, metodo_pago, fecha_venta, hora_venta) VALUES ('$id_venta', '$nombre', '$usuario', '" . implode(", ", $totalUnidades) . "', '$totalVenta', '$descripcion', '$imagen', '$pago', '$fecha_venta', '$hora_venta')";
mysqli_query($con, $sql);

foreach ($id_productos as $index => $producto_id) {
    $cantidad_venta = $totalUnidades[$index];
    $query = "UPDATE productos SET cantidad = cantidad - $cantidad_venta WHERE id_productos = $producto_id";
    mysqli_query($con, $query);
}

header('Location: ventaCompleta.php');
?>