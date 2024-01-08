<?php 
require("../model/Conexion.php");
session_start();

if (!isset($_SESSION['carrito'])) {
    echo "No hay productos en el carrito.";
    exit();
}

$usuario = $_SESSION['user_info'];
$nombre = $usuario['nombre'];

// Obtener el ID del cliente
$sqlCliente = "SELECT id FROM cliente WHERE nombre = :nombre";
$stmtCliente = ConexionBD::obtenerConexion()->prepare($sqlCliente);

if (!$stmtCliente || !$stmtCliente->execute([':nombre' => $nombre]) || $stmtCliente->rowCount() === 0) {
    echo "Error al obtener el ID del cliente.";
    exit();
}

$idCliente = $stmtCliente->fetch(PDO::FETCH_ASSOC)['id'];

// Calcular el total de la compra
$totalCompra = 0;
foreach ($_SESSION['carrito'] as $detalleProducto) {
    $totalCompra += $detalleProducto['cantidad'] * $detalleProducto['precio'];
}

// Insertar la compra en la tabla 'pedido'
$sqlPedido = "INSERT INTO pedido (clienteId, fecha, estado, total) VALUES (:clienteId, :fecha, :estado, :total)";
$stmtPedido = ConexionBD::obtenerConexion()->prepare($sqlPedido);

if (!$stmtPedido || !$stmtPedido->execute([
    ':clienteId' => $idCliente,
    ':fecha' => date('Y-m-d H:i:s', strtotime('now')),
    ':estado' => "En proceso",
    ':total' => $totalCompra
 
])) {
    echo "Error al insertar datos en la base de datos.";
    exit();
}

header("Location: ../page/confirmacion.php");


?>
