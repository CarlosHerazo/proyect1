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
require('../model/Conexion.php');
require '../globals/headers.php';


if (isset($_SESSION['user_info'])) {
    // Acceder a la información del usuario
    $userInfo = $_SESSION['user_info'];

    // Acceder a los campos específicos (por ejemplo, nombre, correo, teléfono, dirección)
    $nombre = $userInfo['nombre'];
    $correo = $userInfo['correo'];
    $telefono = $userInfo['telefono'];
    $mensaje = $userInfo['message'];
    $direccion = $userInfo['direccion'];
} else {
    // Si la información del usuario no está presente en la sesión, redirigir.
    header('Location: ./login.php');
    exit();
}

$stmt = ConexionBD::obtenerConexion()->prepare("SELECT id FROM user WHERE nombre = :nombre");
$stmt->bindParam(':nombre', $nombre);
if ($stmt->execute()) {
    // La consulta se ejecutó con éxito
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ahora, $resultados contiene un array asociativo con las filas resultantes de la consulta
    foreach ($resultados as $fila) {
        $usuarioId = $fila['id'];
    }
} else {
    // Manejar el caso en el que la ejecución de la consulta falló
}
?>

<body>
    <div id="myModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Pedidos por recibir</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Factura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = ConexionBD::obtenerConexion()->prepare("SELECT * FROM `pedido` WHERE clienteId=:usuarioId");
                    $stmt->bindValue(":usuarioId", $usuarioId);
                    if ($stmt->execute()) {
                        // Vinculación de parámetros
                   
                        if ($stmt->rowCount() > 0) {
                            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $id = $fila['id'];
                                $totalFactura = $fila['total'];
                                $fecha = date("d/m/Y H:i:s", strtotime($fila['fecha']));
                                $estado = "En proceso";
                                $factura = $fila['factura'];
                    ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $fecha ?></td>
                                    <td><span class="estado"><?php echo $estado ?></span></td>
                                    <td><?php echo "$" . number_format($totalFactura, 2); ?></td>
                                    <td><a href="../factura/invoice.php" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error al ejecutar la consulta: " . print_r($stmt->errorInfo(), true) . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <br><br><br>
    <main class="main">
        <section>
            <div class="contenedor_img">
                <img class="img-perfil" src="./../img/perfil.png" alt="Imagen de perfil">
            </div>
            <div class="contenedor_info">
                <h1 class="perfil-title"><?php echo $mensaje ?> !!!</h1>
                <h2><?php echo $nombre ?></h2>
                <p><span> Correo electrónico:</span> <?php echo $correo ?></p>
                <p><span>Telefono:</span> <?php echo $telefono ?></p>
                <p><span>Direccion:</span> <?php echo $direccion ?></p>
            </div>
            <a class="logout" href="../controllers/userDestroy.php">Cerrar sesion</a>
        </section>
        <section>
            <div class="card1">
                <h2>productos por Pagar <span><?php echo count($_SESSION['carrito']); ?></span></h2>
                <a class="a-links " href="./carrito.php">Ver detalles</a>
            </div>

            <div class="card2">
                <h2>Pedidos por Recibir <span>1</span></h2>
                <a class="a-links " onclick="openModal()">Ver detalles</a>
            </div>

            <div class="card3">
                <h2>Pedidos Completados <span>1</span></h2>
                <a class="a-links " href="./carrito.php">Ver detalles</a>
            </div>
        </section>
    </main>
    <script src="../js/modal_pedidos.js"></script>
    <?php require '../globals/footers.php'; ?>
</body>

</html>