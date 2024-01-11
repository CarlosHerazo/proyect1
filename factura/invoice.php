<?php
require '../model/Conexion.php';
# Incluyendo librerias necesarias #
require "./code128.php";
session_start();
$productosCarrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
if(isset($_SESSION['user_info'])){
	$usuario = isset($_SESSION['user_info']) ? $_SESSION['user_info'] : [];

		$nombreUsuario = $usuario['nombre'];
		$correoUsuario = $usuario['correo'];
		$telefonoUsuario = $usuario['telefono'];

}else{
	
}


$pdf = new PDF_Code128('P', 'mm', 'letter');

$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('../img/logo.png', 165, 12, 35, 35, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(255, 99, 71);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("Pizza Mania")), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "RUC: 0000000000"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Direccion Cartagena, Bolivar"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: 00000000"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email: correo@ejemplo.com"), 0, 0, 'L');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
date_default_timezone_set('America/Bogota');
$fechaHoraActual = date("d/m/Y h:i A");
// Utilizar en código PDF
$pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", $fechaHoraActual), 0, 0, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(39, 39, 51);
$stmt = ConexionBD::obtenerConexion()->prepare("SELECT `ID_Pedido` FROM `pedidos`");
if ($stmt->execute()) {
	// La consulta se ejecutó correctamente
	if ($stmt->rowCount() > 0) {
		// Hay al menos una fila devuelta
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// Procesar los resultados aquí
			$id = $fila['ID_Pedido'];
		}
	} else {
		// No se encontraron filas
		echo "No se encontraron resultados.";
	}
} else {
	// La consulta no se ejecutó correctamente
	echo "Error al ejecutar la consulta.";
}


$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura Nro. {$id} ")), 0, 0, 'C');



$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $nombreUsuario), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "Doc: "), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $telefonoUsuario), 0, 0);
$pdf->SetTextColor(39, 39, 51);

$pdf->Ln(7);

$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(255, 99, 71);
$pdf->SetDrawColor(255, 99, 71);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
$pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
$pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
$pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);



/*----------  Detalles de la tabla  ----------*/
//Iterar sobre los productos del carrito e imprimirlos en el PDF
foreach ($productosCarrito as $producto) {
	$nombreProducto = $producto['nombre'];
	$cantidadProducto = $producto['cantidad'];
	$precioUnitario = $producto['precio'];
	$subtotal = $cantidadProducto * $precioUnitario;

	$pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $nombreProducto), 'L', 0, 'C');
	$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", $cantidadProducto), 'L', 0, 'C');
	$pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", "$" . number_format($precioUnitario, 2)), 'L', 0, 'C');
	$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$" . number_format($subtotal, 2)), 'LR', 0, 'C');
	$pdf->Ln(7);
}

$total = 0;
foreach ($_SESSION['carrito'] as $producto) {
	$total += $producto['subtotal']; // Suma el subtotal de cada producto al total
}
/*----------  Fin Detalles de la tabla  ----------*/




# Impuestos & totales #
$pdf->Cell(162, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');

$pdf->Ln(7);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');

$totalFormateado = number_format($total, 2, ',', '.');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "Total a Pagar:"), 'T', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$ {$totalFormateado}"), 'T', 0, 'C');


$pdf->Ln(7);
$pdf->SetFont('Arial', 'B', 12);  // Establece la fuente, el estilo y el tamaño
$pdf->SetTextColor(255, 99, 71);  // Establece el color del texto
$pdf->Cell(0, 10, iconv("UTF-8", "ISO-8859-1", "¡GRACIAS POR SU COMPRA!"), 0, 1, 'C');  // Usa 0 para el ancho para ocupar el ancho completo de la página
# Nombre del archivo PDF #
$pdf->Output("I", "Factura.pdf", true);
