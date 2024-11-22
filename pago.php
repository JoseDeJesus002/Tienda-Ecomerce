<?php
session_start();
// Verificar si existe la variable de sesión para el carrito y si es una cadena válida, convertirla a un array
if (isset($_SESSION['usuario'])) {
    $carrito = is_string($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : $_SESSION['usuario'];
} else {
    $carrito = [];
}

include("almacen/querys/conexion.php");
$con = conectar();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y/m/d");
$hora = date('h:i:s');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MINIBAJA - Alimenta tu Mente y Paladar</title>
    <meta name="keywords" content="comida, universidad, calidad, precio bajo">
    <meta name="description" content="MINI BAJA - Comida universitaria de calidad a tu alcance">
    <meta name="author">

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
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
                                <img src="images/Carrito.png" width="50" height="50">
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
                    <h1>PAGO</h1>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title text-center">
                    <h2>Agrega tu informacion</h2>
                    <p>Aquí puedes ver tus productos y confirmar la compra</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="ventas.php" id="payment-form" enctype="multipart/form-data">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($carrito as $index => $producto) {
                                    ?>
                                        <tr>
                                            <th scope="row"> <?php echo ($index + 1) ?></th>
                                            <td hidden> <?php echo $producto['id_productos'] ?></td>
                                            <td> <?php echo $producto['nombre'] ?></td>
                                            <td>$ <?php echo $producto['precio'] ?></td>
                                            <td><?php echo $producto['cantidad'] ?></td>
                                            <?php
                                            $subtotal = $producto['precio'] * $producto['cantidad']; // Multiplicar por la cantidad deseada
                                            ?>
                                            <td>$ <?php echo $subtotal ?></td>

                                            <!-- Agrega campos de cantidad para cada producto en el carrito -->
                                           
                                            <input type="text" name="id_venta" maxlength="11" hidden>
                                            
                                            <input type="text" name="nombre" value="<?= implode(", ", array_column($carrito, 'nombre')) ?>" readonly hidden>

                                            <input type="text" name="id_productos" id="id_productos" value="<?= implode(", ", array_column($carrito, 'id_productos')) ?>" readonly hidden>

                                            <input type="text" name="totalUnidades" id="cantidad" value="<?= implode(", ", array_column($carrito, 'cantidad')) ?>" readonly hidden>

                                        </tr>
                                    <?php
                                        $total += $subtotal;
                                    }
                                    ?>
                                     <input type="text" name="total" id="total" value="<?= $total ?>" readonly hidden>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <label for="usuario">Nombre</label><br>
                    <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu nombre" maxlength="100" required><br><br>

                    <label>Descripcion (donde te encuentras, necesitas cambio, etc)</label><br>
                    <input type="text" name="descripcion" placeholder="Ingresa el edificio y el aula o algún lugar de referencia para poder encontrarte" maxlength="200" required><br><br>

                    <label>Sube una imagen donde te encuentras especificamente</label><br>
                    <input type="file" name="imagen" required><br><br>


                    <label>Pago</label><br>
                    <input type="text" name="paymentType" value="Efectivo" required><br><br>

                    <input type="text" name="fecha_venta" value="<?= $fecha ?>" readonly hidden>
                    <input type="text" name="hora_venta" value="<?= $hora ?>" readonly hidden>

                    <label for="totalVenta">Total de la venta</label><br>
                    <input type="text" name="totalVenta" value="$<?= $total ?>" readonly><br><br>

                    <!-- Agrega más campos aquí según sea necesario -->
                    <button type="submit" class="btn btn-success">Confirmar Pago</button>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <br><br>
    <!-- Start Footer -->
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
        <!-- End Footer -->

        <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

        <!-- ALL JS FILES -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- ALL PLUGINS -->
</body>

</html>