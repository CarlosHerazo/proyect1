<?php
// detallesModel.php

require_once 'Conexion.php';

class DetallesProductoModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new ConexionBD();
    }

    public function obtenerDetallesProducto($productId)
    {
        $conn = $this->conexion->obtenerConexion();

        // Verifica si la conexión es exitosa
        if ($conn) {
            try {
                $stmt = $conn->prepare("SELECT * FROM productos WHERE ID_Producto = :productId");
                $stmt->bindParam(':productId', $productId);
                $stmt->execute();

                // Obtiene los detalles del producto como un arreglo asociativo
                $productoDetalles = $stmt->fetch(PDO::FETCH_ASSOC);

                // Cierra la conexión
                $conn = null;

                return $productoDetalles;
            } catch (PDOException $e) {
                // Manejar errores en la ejecución de la consulta
                echo "Error de consulta: " . $e->getMessage();
                return null; // Producto no encontrado
            }
        } else {
            return null; // No se pudo establecer la conexión
        }
    }
}
