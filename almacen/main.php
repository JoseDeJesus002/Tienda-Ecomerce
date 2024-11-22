<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../login/login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="shortcut icon" href="../images/logo1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style_main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Menu inicial</title>
  </head>
  <body>
    <ul class="menu">
      <li><a href="main.php" class="active">Menu</a></li>
      <li><a href="index.php">Inventario</a></li>
      <li><a href="pedidos.php">Pedido de Unidades</a></li>
      <li><a href="ventaVista.php">Ventas</a></li>
      <div class="derecha">
      <form action="../login/logout.php" method="post">
        <button class="logout" type="submit">Cerrar sesión</button>
      </form>
    </div>
    </ul>
    <br>
    <br>
    <h1 class="title">Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <br>
    <br>
    <div class="servicios" align="center">
        <div class="col">
          <div class="card">
            <div class="icono color1">
              <div class="circulo">
                <i class="fa-solid fa-warehouse" style="color: #ffffff;"></i>
              </div>
            </div>
            <h3>Vizualizacion de Inventario</h3>
            <p>La visualización de inventario es la capacidad que tiene el usuario de ver de manera clara y organizada los productos disponibles.</p>
          </div>
        </div>
          <div class="col">
            <div class="card">
              <div class="icono color2">
                <div class="circulo">
                <i class="fa-solid fa-box-open"></i>
                </div>
              </div>
              <h3>Registro Entrada y Salida Productos</h3>
              <p>El usuario puede registrar el ingreso de nuevos productos al inventario, ya sea a través de compras, así como también puede registrar la salida de productos, ya sea por ventas.</p>
            </div>
          </div>
          <!-- <div class="col">       
            <div class="card">
              <div class="icono color4">
                <div class="circulo">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
              </div>
              <h3>Agregar Usuarios</h3>
              <p>Tiene la capacidad de crear nuevas cuentas o perfiles de usuario en una plataforma para sus empleados.</p>
            </div>
          </div> -->
          <div class="col">     
            <div class="card">
              <div class="icono color5">
                <div class="circulo">
                <i class="fa-solid fa-file-pdf" style="color: #ffffff;"></i>
                </div>
              </div>
              <h3>Generar Excel</h3>
              <p>Tiene acceso a un servicio que le permite generar archivos Excel que contienen reportes del estado actual del almacén.</p>
            </div>
          </div>
  </body>
</html>
