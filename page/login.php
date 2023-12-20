<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Pizza Company - Login y Registro</title>
</head>
<body>
    <div class="container">
        <!-- Panel de Inicio de Sesión -->
        <div class="form-container sign-in-container">
            <form action="#" id="login-form">
                <h1>Iniciar Sesión</h1>
                <input type="email" placeholder="Correo Electrónico" name="user"/>
                <input type="password" placeholder="Contraseña" name="contra"/>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit"> Iniciar Sesión</button>
            </form>
        </div>

        <!-- Panel de Registro -->
        <div class="form-container sign-up-container" id="registro-form">
            <form action="" >
                <h1>Crear Cuenta</h1>
                <input type="text" placeholder="Nombre" name="name"/>
                <input type="email" placeholder="Correo Electrónico" name="email" />
                <input type="password" placeholder="Contraseña"  name="pass"/>
                <input type="text" placeholder="Direccion" name ="adress"/>
                <input type="number" placeholder="Telefono" name ="phone"/>
                <button name="btn-registrar" type="submit">Registrarse</button>
            </form>
        </div>

        <!-- Panel Lateral -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido de nuevo!</h1>
                    <p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
                    <button class="ghost" id="signIn">Iniciar Sesión</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hola, Amigo!</h1>
                    <p>Ingrese sus datos personales y comience su viaje con nosotros</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.querySelector('.container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
    <script src="../js/sign-up-sign-in.js"></script>
</body>
</html>
