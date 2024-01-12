<?php
// Iniciar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Elimina la variable de sesión específica para el carrito
session_destroy();

// Redirige al carrito o a la página que desees después de eliminar la sesión del carrito
header("Location: ../index.html");
exit();
?>