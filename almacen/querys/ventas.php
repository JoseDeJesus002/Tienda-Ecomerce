<?php
    include("conexion.php");
    $con = conectar();

      // Obtenemos los datos del formulario
      $id_venta = $_POST['id_venta'];
      $id_productos = $_POST['id_productos'];
      $nombre = $_POST['nombre'];
      $usuario = $_POST['usuario'];
      $totalUnidades = $_POST['totalUnidades'];
      $totalVenta = $_POST['totalVenta'];
      $descripcion = $_POST['descripcion'];
      $pago = $_POST['paymentType'];
      $fecha_venta = $_POST['fecha_venta'];
      $hora_venta = $_POST['hora_venta'];

      // Verificamos que la cantidad de productos a vender no sea mayor que la cantidad disponible en inventario
      $query = "SELECT cantidad FROM productos WHERE id_productos = $id_productos";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);


    
      if ($totalUnidades > $row['cantidad']) {
        echo '<script language="javascript">alert("Error la cantidad es mayor a la disponible"); window.location="../index.php";</script>';
      } else {
        $sql="insert into ventas(id_venta,id_producto,nombre_producto,usuario,total_unidades_vendidas,total_venta,descripcion,metodo_pago,fecha_venta,hora_venta)values('".$id_venta."','".$id_productos."', '".$nombre."','".$usuario."','".$totalUnidades."','".$totalVenta."','".$descripcion."','".$pago."','".$fecha_venta."','".$hora_venta."')";
        mysqli_query($con, $sql);
    
        // Actualizamos la cantidad disponible en inventario
        $nueva_cantidad = $row['cantidad'] - $totalUnidades;
        $query = "UPDATE productos SET cantidad = $nueva_cantidad WHERE id_productos = $id_productos";
        mysqli_query($con, $query);
    
        // Mostramos un mensaje de éxito
        echo '<script language="javascript">alert("La venta ha sido registrada exitosamente."); window.location="../index.php";</script>';
      }
?>