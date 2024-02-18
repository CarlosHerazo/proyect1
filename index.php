
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!--Fuentes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- ... tus otros enlaces y scripts ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;500;600;0,800;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <title>Inicio</title>
</head>

<body>
    <!-- <header class="header-content primary">
        <div class="header-contact">
            <p> CELL: +57 3135885420</p>
            <p> Carrera #48 Cra 59-25</p>
        </div>
    </header> -->
    <!--comienzo del header-->
    <header class="header-content ">
        <div class="content-logo">
            <img src="./img/logo.png" alt="PizzaMania Logo" class="logo"> <!-- Logo de PizzaMania -->
            <p>Pizza<span>Mania</span></p>
        </div>
        <div class="nav-var">
            <nav>
                <ul>
                    <a href="#">
                        <li>Inicio</li>
                    </a>
                    <a href="./page/productos.php">
                        <li>productos</li>
                    </a>
                    <a href="./page/contactos.php">
                        <li>contactos</li>
                    </a>
                    <a href="./page/carrito.php">
                        <li><i class="fas fa-shopping-cart"></i></li>
                    </a>
                    <a href="./page/login.php">
                        <li><i class="fas fa-user"></i></li>
                    </a>
                </ul>
                <div class="hamburger-menu">
                    <!-- Icono del Menú Hamburguesa -->
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!--fin del header-->

    <!--comienzo del Main-->
    <Main class="main-content">

        <div id="loader-wrapper">
            <div id="loader">
                <img src="./img/logo.png" alt="Cargando..."> <!-- Cambia con tu imagen -->
            </div>
        </div>
        <!--Asaide-->
        <br>
        <div class="pizza-aside">       
            <video class="video" src="./video/video.mp4" autoplay muted loop></video>
            <div class="aside-content">
                <div class="title-aside">
                    <h2 class="text-title-aside">Los mejores precios en pizza</h2>
                    <p class="text-product">¡Ordena la tuya ahora!</p>
                    <a href="./page/productos.php" class="btn">ORDENAR AHORA</a>
                </div>
            </div>
        </div>
        <!--Fin Asaide img-->
        <h2 class="section-title">Nuestros Productos</h2>
        <div class="alerta" id="miAlerta">¡Elemento agregado correctamente!</div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Repetir esta sección para cada tarjeta de producto -->
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-1.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-2.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-3.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-4.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-5.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="div-product">
                        <div class="header-slaider">
                            <img src="./img/pizza-6.png" alt="pizza">
                        </div>
                        <div class="body-slaider">
                            <h2>Pizza Italiana</h2>
                            <p class="Precio">$80.00</p>
                            <div class="testimonial-stars">
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="fas fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i> <!-- Estrella activa -->
                                <i class="far fa-star"></i>
                                <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                            </div>
                            <div class="btn-Botones">
                                <button class="btn" onclick="mostrarAlerta()">Agregar</button>
                                <button class="btn">Ver detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <!--Contactos-->
        <section class="contact-section pizza-style">
            <h2 class="">Contáctanos</h2>
            <form class="contact-form" action="tu_script_de_procesamiento.php" method="POST">
                <input type="text" name="nombre" placeholder="Tu Nombre" required>
                <input type="email" name="email" placeholder="Tu Email" required>
                <textarea name="mensaje" placeholder="Tu Mensaje" required></textarea>
                <button type="submit" class="btn">Enviar Mensaje</button>
            </form>
        </section>
        <br>
        <!--Reseñas-->
        <section class="testimonials-section">
            <h2 class="section-title">Lo que dicen nuestros clientes</h2>
            <div class="testimonial-cards">
                <div class="testimonial-card">
                    <img src="img/logo.png" alt="Perfil de Juan Pérez" class="testimonial-img">
                    <p>"Las mejores pizzas que he probado. Ingredientes frescos y entrega rápida."</p>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                    </div>
                    <h3>- Juan Pérez</h3>
                </div>
                <div class="testimonial-card">
                    <img src="img/logo.png" alt="Perfil de María López" class="testimonial-img">
                    <p>"Gran variedad y sabores únicos. ¡Siempre vuelvo por más!"</p>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella activa -->
                        <i class="fas fa-star"></i> <!-- Estrella inactiva, cambiar a "far fa-star" si se desea -->
                    </div>
                    <h3>- María López</h3>
                </div>
                <!-- Puedes agregar más tarjetas de testimonio aquí -->
            </div>
        </section>
        <br>
        <footer class="site-footer">
            <p>© 2023 PizzaMania. Todos los derechos reservados.</p>
            <p>Diseñado por HERAZO DEVELOPER</p>
        </footer>

    </Main>

    <script>
        window.addEventListener('mouseover', initLandbot, { once: true });
        window.addEventListener('touchstart', initLandbot, { once: true });
        var myLandbot;
        function initLandbot() {
          if (!myLandbot) {
            var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
            s.addEventListener('load', function() {
              var myLandbot = new Landbot.Livechat({
                configUrl: 'https://storage.googleapis.com/landbot.site/v3/H-2096067-810XQFYJ8PB4DK08/index.json',
              });
            });
            s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
          }
        }
        </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./js/swiper.js"></script>
    <script src="./js/slaider_js.js"></script>
    <script src="./js/cargando.js"></script>
    <script src="./js/alerta.js"></script>
</body>

</html>