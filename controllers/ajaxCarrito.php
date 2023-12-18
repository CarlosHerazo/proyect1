<?php
session_start();


if (isset($_POST['accion'], $_POST['indice'])) {
    $indice = $_POST['indice'];
    if ($_POST['accion'] == 'incrementar' && isset($_SESSION['carrito'][$indice])) {
        $_SESSION['carrito'][$indice]['cantidad']++;
        $_SESSION['carrito'][$indice]['subtotal'] = $_SESSION['carrito'][$indice]['precio'] * $_SESSION['carrito'][$indice]['cantidad'];
    } elseif ($_POST['accion'] == 'decrementar' && isset($_SESSION['carrito'][$indice])) {
        if ($_SESSION['carrito'][$indice]['cantidad'] > 1) {
            $_SESSION['carrito'][$indice]['cantidad']--;
            $_SESSION['carrito'][$indice]['subtotal'] = $_SESSION['carrito'][$indice]['precio'] * $_SESSION['carrito'][$indice]['cantidad'];
        }
    }

    // Redirigir de nuevo al carrito o devolver alguna respuesta
}else{

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    if (isset($_POST['id'], $_POST['nombre'], $_POST['precio'])) {
        $productId = $_POST['id'];
        $productName = $_POST['nombre'];
        $productPrice = floatval($_POST['precio']);
    
        $encontrado = false;
        foreach ($_SESSION['carrito'] as $id => $producto) {
            if ($producto['id'] == $productId) {
                $_SESSION['carrito'][$id]['cantidad'] += 1; // Incrementa la cantidad
                $_SESSION['carrito'][$id]['subtotal'] = $_SESSION['carrito'][$id]['precio'] * $_SESSION['carrito'][$id]['cantidad']; // Actualiza el subtotal
                $encontrado = true;
                break;
            }
        }
    
        if (!$encontrado) {
            $_SESSION['carrito'][] = array(
                'id' => $productId,
                'nombre' => $productName,
                'cantidad' => 1,
                'precio' => $productPrice,
                'subtotal' => $productPrice, // Subtotal es igual al precio ya que la cantidad es 1
            );
        }
    
       
        var_dump($_SESSION['carrito']); // Solo para depuración
    
    }
    
}






?>
