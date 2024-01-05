<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/carrito.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <!-- ... tus otros enlaces y scripts ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Perfil User</title>
</head>

<?php
require '../globals/headers.php';

if (isset($_SESSION['user_info'])) {
    // Acceder a la información del usuario
    $userInfo = $_SESSION['user_info'];

    // Acceder a los campos específicos (por ejemplo, nombre, correo, teléfono, dirección)
    $nombre = $userInfo['nombre'];
    $correo = $userInfo['correo'];
    $telefono = $userInfo['telefono'];
    $mensaje= $userInfo['message'];
    $direccion = $userInfo['direccion'];

} else {
    // Si la información del usuario no está presente en la sesión, redirigir.
    header('Location: ./login.php');
    exit();
}
?>

<body>
    <br><br><br>
    <section>
        <div class="contenedor_img">
            <img class="img-perfil" src="./../img/perfil.png" alt="Imagen de perfil">
        </div>
        <div class="contenedor_info">
            <h1 class="perfil-title"><?php echo $mensaje?> !!!</h1>
            <h2><?php echo $nombre ?></h2>
            <p><span> Correo electrónico:</span> <?php echo $correo ?></p>
            <p><span>Telefono:</span> <?php echo $telefono ?></p>
            <p><span>Direccion:</span> <?php echo $direccion ?></p>
        </div>
    </section>

   <?php require '../globals/footers.php'; ?>
</body>

</html>