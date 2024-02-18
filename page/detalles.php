<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fuentes-->
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrito.css">
    <link rel="stylesheet" href="../css/detalles.css">

    <!-- ... tus otros enlaces y scripts ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;500;600;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Detalles</title>
</head>

<body>

    <?php require '../globals/headers.php'; ?>
    <br><br><br><br><br>
    <main>
        <div class="container">
            <div class="images" id="img">
                <img src="../img/combo-familiar-1.png" alt="">
            </div>
            <div class="product">

                <samp>
                    <h1 class="title" id="title"></h1>
                    <p class="category" id="category"></p>
                </samp>
                <h2 class="price" id="price"></h2>
                <p class="desc" id="desc">

                </p>
                <div class="div-butoms">
                    <div class="quantity">
                        <h4>cantidad: </h4>
                        <button class="quantity-minus">-</button>
                        <span id="quantity-value">1</span>
                        <button class="quantity-plus">+</button>
                    </div>

                    <div class="buttons">
                        <button class="add">Añadir al Carrito</button>
                        <button class="add"><i class="far fa-heart heart-icon"></i></button>
                    </div>

                </div>

            </div>
        </div>
    </main>


    <script src="../js/inter-detalles.js"></script>
    <?php require '../globals/footers.php'; ?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="../js/swiper.js"></script>
    <script src="../js/slaider_js.js"></script>
    <script src="../js/detalles.js"></script>
</body>

</html>