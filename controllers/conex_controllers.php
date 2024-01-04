<?php

// Leer las variables de entorno desde el archivo .env
$envFile = './../model/variables.env';
if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile);
    foreach ($envVariables as $key => $value) {
        putenv("$key=$value");
    }
}

// Obtén las variables de entorno
$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PASS');
$dbName = getenv('DB_NAME');

// Incluir la clase de conexión
require_once './../model/conexion.php';

// Crear una instancia de la clase ConexionBD
$conexion = new ConexionBD($dbHost, $dbUser, $dbPass, $dbName);

// Obtén la conexión
$conn = $conexion->obtenerConexion();

// Realizar tus operaciones con la base de datos aquí


?>
