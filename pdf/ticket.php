<?php
session_start();
// Verificar si existe la variable de sesión para el carrito y si es una cadena válida, convertirla a un array
if (isset($_SESSION['usuario'])) {
    $carrito = is_string($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : $_SESSION['usuario'];
} else {
    $carrito = [];
}
// Crear una instancia de TCPDF
require_once('../almacen/pdf/tcpdf/tcpdf.php');
$pdf = new TCPDF();

// Configurar la información del documento
$pdf->SetCreator('Nombre del Creador');
$pdf->SetAuthor('Nombre del Autor');
$pdf->SetTitle('Ticket de Compra');
$pdf->SetSubject('Detalle de Compra');
$pdf->SetKeywords('Ticket, Compra');

// Agregar una página
$pdf->AddPage();

// Establecer la fuente y el tamaño de texto
$pdf->SetFont('helvetica', '', 12);

// Contenido del ticket (puedes personalizarlo según tus necesidades)
$contenido = '
  <h1>Ticket de Compra</h1>
  <p>Gracias por tu compra. Aquí tienes los detalles de tu compra:</p>
  <table border="1">
    <tr>
      <th colspan="4">Detalles de la compra</th>
    </tr>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Precio unitario</th>
      <th>Subtotal</th>
    </tr>';

// Calcular el total de la compra
$totalCompra = 0;

foreach ($carrito as $producto) {
  $nombre = $producto['nombre'];
  $cantidad = $producto['cantidad'];
  $precioUnitario = $producto['precio'];
  $subtotal = $cantidad * $precioUnitario;

  $contenido .= "
    <tr>
      <td>$nombre</td>
      <td>$cantidad</td>
      <td>$" . number_format($precioUnitario, 2) . "</td>
      <td>$" . number_format($subtotal, 2) . "</td>
    </tr>";

  $totalCompra += $subtotal;
}

$contenido .= '
  </table>
  <p>Total de la compra: $' . number_format($totalCompra, 2) . '</p>
  <p>Gracias por tu compra.</p>
';

// Escribir el contenido en el PDF
$pdf->writeHTML($contenido, true, false, true, false, '');
$ticketFilename = 'ticket_compra.pdf';
// Generar el PDF y mostrarlo en el navegador
$pdf->Output($ticketFilename, 'I'); // 'F' guarda el archivo en el servidor

// Redirigir al usuario a la página de confirmación de la compra
header('Location: confirmacionCompra.php?ticket=' . $ticketFilename);
?>
