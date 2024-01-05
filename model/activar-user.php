<?php
require 'UserModel.php';

if (isset($_GET['hash']) && isset($_GET['email'])) {
    $hash = $_GET['hash'];
    $email = $_GET['email'];
    // Activar la cuenta del usuario
    $resultado = UserModel::mdlActivarUsuario($hash, $email);

    if($resultado === "Cuenta activada con éxito") {
        echo "Tu cuenta ha sido activada con éxito.";
    } else {
        echo "Error al activar tu cuenta. Por favor, intenta de nuevo o contacta al soporte.";
    }
} else {
    echo "Error: El código de activación no está presente.";
}
?>
