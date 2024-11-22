<?php
session_start();

// Verificar si existe la variable de sesión para el carrito y si es una cadena válida, convertirla a un array
if (isset($_SESSION['usuario'])) {
    $carrito = is_string($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : $_SESSION['usuario'];
} else {
    $carrito = [];
}

// Verificar si se envió una solicitud para eliminar un producto
if (isset($_POST['eliminar_producto'])) {
    $producto_id = $_POST['producto_id'];

    // Buscar y eliminar el producto del carrito por su ID
    foreach ($carrito as $index => $producto) {
        if ($producto['id_productos'] === $producto_id) {
            unset($carrito[$index]);
            break;
        }
    }

    // Actualizar la variable de sesión
    $_SESSION['usuario'] = $carrito;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MINI BAJA - Alimenta tu Mente y Paladar</title>
    <meta name="keywords" content="comida, universidad, calidad, precio bajo">
    <meta name="description" content="MINIBAJA - Comida universitaria de calidad a tu alcance">
    <meta name="author">

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo1.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                        <li style="float:right;">
                            <a href="reservation.php">
                                <img src="images/Carrito.png" width="40" height="40">
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Más</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="about.php">¿Deseas trabajar?</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>PEDIDO</h1>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Productos en el Carrito</h2>
                    <p>Aquí puedes revisar y pagar tus productos</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($carrito as $index => $producto) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ($index + 1)  ?></th>
                            <!-- id del producto -->
                            <td hidden><?php echo $producto['id_productos'] ?></td>
                            <td><?php echo  $producto['nombre']  ?></td>
                            <td>$<?php echo $producto['precio']  ?></td>
                            <td><?php echo $producto['cantidad'] ?></td>
                            <?php
                            $subtotal = $producto['precio'] * $producto['cantidad']; // Multiplicar por la cantidad deseada
                            ?>
                            <td>$<?php echo  $subtotal ?></td>
                            <td>
                                <!-- Agregar un formulario para eliminar el producto del carrito -->
                                <form method="post">
                                    <input type="hidden" name="producto_id" value="<?php echo $producto['id_productos'] ?>">
                                    <button class="btn btn-danger" name="eliminar_producto">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                    <?php
                        $total += $subtotal;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mostrar el total y permitir al usuario continuar con el proceso de compra -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Total: $<?php echo $total; ?></h3>
                <!-- Agregar aquí los detalles de envío y pago -->
                <button class="btn btn-success">
                    <a href="pago.php" style="color: white; text-decoration: none;">Pagar</a>
                </button>
            </div>
        </div>
    </div>
    <br><br>
    <footer class="footer-area bg-f">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <p class="company-name">Todos los derechos reservados. &copy; 2023 <a href="#">Minibaja</a> Diseñado por : Grupo 2723IS</p>
                    </center>
                </div>
            </div>
        </div>
        <br><br>
    </footer>


    <a href="#" id="back-to-top" title="Ir arriba" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>