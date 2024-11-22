<?php
     include("conexion.php");
     $con = conectar();
     $id = $_GET['id'];
     $sql = "DELETE FROM productos WHERE id_productos = '$id' AND cantidad = 0";
     if (mysqli_query($con, $sql)) {
        echo '<script language="javascript">alert("Producto eliminado corectamente."); window.location="../index.php";</script>';
     } else {
         echo '<script language="javascript">
         alert("No se puede eliminar el producto porque aún tiene stock");
         </script>';
         header("Location: ../index.php");
     }
     mysqli_close($con);
?>

