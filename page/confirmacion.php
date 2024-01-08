<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #FDF4D9;
        }

        .confirmation-container {
            text-align: center;
        }

        .icon-success {
            color: #4CAF50;
            font-size: 48px;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        a {
            background-color: #FF6347;
            padding: 15px 20px;
            margin-top: 40px;
            text-decoration: none;
            color: #f5f5f5;
            font-weight: 700;
            border-radius: 10px;
        }

        a:hover {
            background-color: #C0392B;
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="confirmation-container">
        <i class="fas fa-check-circle icon-success"></i>
        <h2>Pago Confirmado</h2>
        <p>¡Gracias por tu compra!</p>
    </div>
    <a href="../controllers/carritoDestroy.php">Volver al carrito</a>
</body>
</html>