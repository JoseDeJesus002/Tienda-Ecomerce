<?php
session_start();

// Verificar si existe la variable de sesión para el carrito, si no, inicializarla
$carrito = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : [];

// Path: agregar_carrito.php
if (isset($_POST['agregar_al_carrito'])) {
    // Obtener los datos del producto
    $producto_id = $_POST['producto_id'];
    $producto_nombre = $_POST['producto_nombre'];
    $producto_precio = $_POST['producto_precio'];
    $producto_cantidad = $_POST['producto_cantidad'];

    // Verificar si $carrito es una cadena y convertirla a un array si es necesario
    if (is_string($carrito)) {
        $carrito = unserialize($carrito);
    }

    // Agregar al carrito
    $nuevo_producto = array(
        'id_productos' => $producto_id,
        'nombre' => $producto_nombre,
        'precio' => $producto_precio,
        'cantidad' => $producto_cantidad
    );

    // Agregar el nuevo producto al carrito
    $carrito[] = $nuevo_producto;

    // Almacenar el carrito actualizado en la variable de sesión
    $_SESSION['usuario'] = $carrito;
    header('Location: menu.php');
}


?>