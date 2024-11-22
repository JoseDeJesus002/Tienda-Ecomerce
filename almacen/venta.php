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
  <link rel="stylesheet" type="text/css" href="css/style_agregar.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de venta</title>
</head>

<body>
  <?php
  include("querys/conexion.php");
  $con = conectar();
  date_default_timezone_set('America/Mexico_City');
  $fecha = date("Y/m/d");
  $hora = date('h:i:s');
  $id = $_GET['id'];
  $sql = "SELECT * FROM productos WHERE id_productos = '$id'";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
  $sql2 = "SELECT * FROM pedidos";
  $query = mysqli_query($con, $sql2);
  ?>
  <br><br><br>
  <h1>Registro de producto</h1>
  <br><br><br>
  <div>
    <form action="querys/ventas.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="id_venta" maxlength="11" hidden><br>
      <label>Id producto</label><br>
      <input type="text" name="id_productos" maxlength="11" value="<?php echo $row['id_productos'] ?>" readonly><br><br>

      <label>Nombre del producto</label><br>
      <input type="text" name="nombre" maxlength="30" value="<?php echo $row['nombre'] ?>" readonly><br><br>

      <label for="usuario">Usuarios</label><br>
      <select name="usuario" required>

        <option value="usuario">Selecciona un usuario</option>
        <output label="usuario">
          <?php
          $categoria = "SELECT Usuario FROM usuarios";
          $resultado = mysqli_query($con, $categoria);
          while ($row = mysqli_fetch_array($resultado)) {
            echo '<option value="' . $row['Usuario'] . '">' . $row['Usuario'] . '</option>';
          }
          ?>
        </output>
      </select><br><br>

      <label>Total unidades vendidas</label><br>
      <input type="text" name="totalUnidades" required><br><br>

      <label>Total venta</label><br>
      <input type="text" name="totalVenta" required><br><br>

      <label>Descripcion</label>
      <input type="text" name="descripcion" placeholder="Ingresa el edificio y el aula o algun lugar de referencia para poder encontrarte" maxlength="100" required><br><br>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentType" id="tarjeta" value="tarjeta">
        <label class="form-check-label" for="tarjeta">
          Pagar con Tarjeta
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentType" id="ticket" value="ticket">
        <label class="form-check-label" for="ticket">
          Pagar en Físico con la creacion de un Ticket
        </label>
      </div>

      <label>Fecha venta</label><br>
      <input type="text" name="fecha_venta" value="<?= $fecha ?>" readonly><br><br>

      <label>Hora venta</label><br>
      <input type="text" name="hora_venta" value="<?= $hora ?>" readonly><br><br>

      <a href="index.php">REGRESAR</a>
      <input type="submit" name="" value="Vender">
    </form>
  </div>
  <br><br><br>
  </div>
  <script src="js/combo_function.js"></script>
</body>

</html>