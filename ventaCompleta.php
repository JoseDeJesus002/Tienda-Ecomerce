<?php
session_start();
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
  <div class="container">
  <h1>Descarga tu Ticket.</h1>
  <a href="pdf/ticket.php" target="_blank" id="btnDescargarTicket" class="btn btn-success">Descargar Ticket</a>
    <h1>¡Gracias por tu compra!</h1>
    <p>Tu compra se ha procesado con éxito.</p>
    
    <p>Redirigiendo en 5 segundos...</p>
  </div>
  <?php
  ?>
  <script>
    // Después de 3 segundos, redirige al usuario
    setTimeout(function() {
      window.location.href = "eliminarCarrito.php";
    }, 3000); // 3000 milisegundos (3 segundos)
  </script>
</body>

</html>