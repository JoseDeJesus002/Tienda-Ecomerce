<?php
include("conexion.php");
$con = conectar();
date_default_timezone_set('America/Mexico_City');
//variables
$id_pedido = $_POST['id_pedido'];
$id_productos = $_POST['id_productos'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$hora_ingreso = $_POST['hora_ingreso'];

//Registra el ingreso de stock

//actualiza el stock
function actualizarStock($id_productos, $cantidad)
{
    $con = conectar();
    $sql = "SELECT * FROM productos WHERE id_productos = '$id_productos'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $cantidades = $row['cantidad'];
    $total_stock = $cantidades + $cantidad;
    $sql = "UPDATE productos SET cantidad = '$total_stock' WHERE id_productos = '$id_productos'";
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
        header("Location: ../index.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}


//registra el ingreso de stock
if ($id_pedido != null || $id_productos != null || $nombre != null || $total_stock != null || $total != null || $fecha_ingreso != null || $hora_ingreso != null) {
    $sql = "INSERT INTO pedidos (id_pedido, id_producto, nombre_producto, cantidad_ingreso, total_pedido, fecha_ingreso, hora_ingreso) VALUES ('" . $id_pedido . "','" . $id_productos . "','" . $nombre . "','" . $cantidad . "','".$total."','" . $fecha_ingreso . "','" . $hora_ingreso . "')";

    if (mysqli_query($con, $sql)) {
        echo '<script language="javascript">alert("Registrado correctamente");  window.location="../index.php"</script>';
        actualizarStock($id_productos, $cantidad);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>

