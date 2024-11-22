<?php
    include("conexion.php");
    $con=conectar();
    $id=$_GET['id'];
    $sql="DELETE FROM productos_agotados WHERE id_productos = '$id'";
    $query = mysqli_query($con,$sql);
    if($query)
    {
        header("Location:../productos_agotados.php");
    }
    mysqli_close($con);
?>