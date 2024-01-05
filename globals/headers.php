<?php
require '../controllers/ajaxCarrito.php';
?>
<header class="header-content">
        <div class="content-logo">
            <img src="../img/logo.png" alt="PizzaMania Logo" class="logo"> <!-- Logo de PizzaMania -->
            <p>Pizza<span>Mania</span></p>
        </div>
        <div class="nav-var">
            <nav>
                <ul>
                    <a href="../index.html">
                        <li>Inicio</li>
                    </a>
                    <a href="../page/productos.php">
                        <li>productos</li>
                    </a>
                    <a href="../page/contactos.php">
                        <li>contactos</li>
                    </a>
                    <a class="carrito" href="../page/carrito.php">
                        <li><i class="fas fa-shopping-cart"></i></li>
                        <div class="conteo"><?php echo count($_SESSION['carrito']); ?></div>
                    </a>
                 <?php   
                 if (isset($_SESSION['user_info']) && $_SESSION['user_info']) { 
                    echo  '<a  href="perfilUser.php">
                            <li><i class="fas fa-user"></i></li>          
                        </a>';
                    }
                  else {
                            // Mostrar enlace para iniciar sesión
                    echo '<a  href="../page/login.php ">
                    <li><i class="fas fa-user"></i></li>          
                        </a>';
                        }
                ?>
                </ul>
                <div class="hamburger-menu">
                    <!-- Icono del Menú Hamburguesa -->
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>