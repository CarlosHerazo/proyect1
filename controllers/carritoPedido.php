<?php
require("../model/Conexion.php");
session_start();

if (!isset($_SESSION['carrito'])) {
    echo "No hay productos en el carrito.";
    exit();
}

$usuario = $_SESSION['user_info'];
$id_cliente = $usuario['id_Cliente'];
$nombre = $usuario['nombre'];


// Calcular el total de la compra
$totalCompra = 0;
foreach ($_SESSION['carrito'] as $detalleProducto) {
    $totalCompra += $detalleProducto['cantidad'] * $detalleProducto['precio'];
}
date_default_timezone_set('America/Bogota');
// Insertar la compra en la tabla 'pedido'
$sqlPedido = "INSERT INTO pedidos (ID_Cliente, fecha, estado, total) VALUES (:clienteId, :fecha, :estado, :total)";
$conexion = ConexionBD::obtenerConexion();
$stmtPedido = $conexion->prepare($sqlPedido);

if($stmtPedido){
    if ($stmtPedido->execute([
        ':clienteId' => $id_cliente,
        ':fecha' =>  date('Y-m-d H:i:s'),
        ':estado' => "En preparación",
        ':total' => $totalCompra
    ])) {
        // Obtener el último ID insertado
        $ultimoIdPedido = $conexion->lastInsertId();
        echo "Pedido insertado con éxito. ID del pedido: " . $ultimoIdPedido;
    } else {
        echo "Error al insertar datos en la base de datos.";
        exit();
    }
} else {
    echo "Error al preparar la consulta.";
    exit();
}


// header("Location: ../page/confirmacion.php");
