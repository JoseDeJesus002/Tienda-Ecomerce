<?php
// Path: pdf.php
session_start();
include('../querys/conexion.php');
$con = conectar();

include('tcpdf/tcpdf.php'); // Requiere la librería TCPDF

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

if (empty($desde) || empty($hasta)) {
    $sql = "SELECT nombre_producto, total_venta, metodo_pago, fecha_venta FROM ventas";
    $resultado = mysqli_query($con, $sql);
}else{
    $sql = "SELECT nombre_producto, total_venta, metodo_pago, fecha_venta FROM ventas WHERE fecha_venta BETWEEN '$desde' AND '$hasta'";
    $resultado = mysqli_query($con, $sql);
}

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nombre del autor');
$pdf->SetTitle('Ventas - Almacén');
$pdf->SetSubject('Ventas de  Almacén');
$pdf->SetKeywords('ventas, productos, almacén');

// Establecer márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Establecer modo de fuente subconjunto
$pdf->setFontSubsetting(true);

// Agregar una página
$pdf->AddPage();

// Título del documento
$pdf->SetFont('Helvetica', 'B', 18);
$pdf->Cell(0, 15, 'Ventas - Almacén', 0, 1, 'C');
$pdf->Cell(0, 15, "Desde: $desde Hasta: $hasta" , 0, 1, 'C');
// Agregar tabla con datos de las salidas de productos
$pdf->SetFont('Helvetica', '', 10);

// Cabecera de la tabla
$pdf->Cell(50, 10, 'Producto', 1, 0, 'C');
$pdf->Cell(40, 10, 'Cantidad', 1, 0, 'C');
$pdf->Cell(40, 10, 'Precio', 1, 0, 'C');
$pdf->Cell(40, 10, 'Fecha', 1, 1, 'C');

// Datos de ejemplo
while ($fila = $resultado->fetch_assoc()) {
    // ... agregar más datos de salidas de productos aquí
        $pdf->Cell(50, 5, $fila['nombre_producto'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['total_venta'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['metodo_pago'], 1, 0, "C");
        $pdf->Cell(40, 5, $fila['fecha_venta'], 1, 0, "C");
        $pdf->Ln();
}

// Salida del archivo PDF
$pdf->Output('Ventas_productos_almacen.pdf', 'I');
