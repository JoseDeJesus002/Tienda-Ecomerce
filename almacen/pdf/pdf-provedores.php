<?php
// Path: pdf.php
session_start();
include('../querys/conexion.php');
$con = conectar();

include('tcpdf/tcpdf.php'); // Requiere la librería TCPDF

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

if (empty($desde) || empty($hasta)) {
    $sql = "SELECT id_proveedor, nombre, fotografia, direccion, telefono, rubro, correo_electronico FROM proveedores";
    $resultado = mysqli_query($con, $sql);
}else{
    $sql = "SELECT id_proveedor, nombre, fotografia, direccion, telefono, rubro, correo_electronico FROM proveedores WHERE fecha_ingreso BETWEEN '$desde' AND '$hasta'";
    $resultado = mysqli_query($con, $sql);
}

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nombre del autor');
$pdf->SetTitle('Reporte de proveedores');
$pdf->SetSubject('Salidas de Productos en el Almacén');
$pdf->SetKeywords('salidas, productos, almacén');

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
$pdf->Cell(0, 15, 'Reporte de proveedores', 0, 1, 'C');
$pdf->Cell(0, 15, "Desde: $desde Hasta: $hasta" , 0, 1, 'C');
// Agregar tabla con datos de las salidas de productos
$pdf->SetFont('Helvetica', '', 10);

// Cabecera de la tabla
    
    $pdf->Cell(20, 10, 'id_proveedor', 1, 0, 'C');
    $pdf->Cell(30, 10, 'nombre', 1, 0, 'C');
    $pdf->Cell(40, 10, 'fotografia', 1, 0, 'C');
    $pdf->Cell(30, 10, 'direccion', 1, 0, 'C');
    $pdf->Cell(25, 10, 'telefono', 1, 0, 'C');
    $pdf->Cell(25, 10, 'rubro', 1, 1, 'C');
    $pdf->Cell(25, 10, 'correo_electronico', 1, 1, 'C');

// Datos de ejemplo
while ($fila = $resultado->fetch_assoc()) {
    // ... agregar más datos de salidas de productos aquí
    $pdf->Cell(20, 10, $fila['id_proveedor'], 1, 0, 'C');
    $pdf->Cell(20, 10, $fila['nombre'], 1, 0, 'C');
    $pdf->Cell(40, 10, $fila['fotografia'], 1, 0, 'C');
    $pdf->Cell(35, 10, $fila['direccion'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['telefono'], 1, 0, 'C');
    $pdf->Cell(25, 10, $fila['rubro'], 1, 0, 'C');
    $pdf->Cell(25, 10, $fila['correo_electronico'], 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output('salidas_productos_almacen.pdf', 'I');
