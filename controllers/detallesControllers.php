<?php
// detallesControllers.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $productId = $_POST['id'];

        // Incluye la clase DetallesProductoModel
        require_once('../model/detallesModel.php');

        // Crea una instancia de la clase
        $detallesModel = new DetallesProductoModel();

        // Llama al método en la instancia para obtener los detalles del producto por su ID
        $productoDetalles = $detallesModel->obtenerDetallesProducto($productId);

        // Puedes devolver los detalles del producto como respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($productoDetalles);
    } else {
        // Manejo de error si no se proporciona el ID del producto
        http_response_code(400);
        echo "Error: Se requiere el ID del producto";
    }
} else {
    // Manejo de error si la solicitud no es de tipo POST
    http_response_code(405);
    echo "Error: Método no permitido";
}
