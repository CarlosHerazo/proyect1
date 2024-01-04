<?php

class ConexionBD
{
    public static function obtenerConexion()
    {
        try {
            $conn = new PDO(
                "mysql:host=localhost;dbname=pizzabd",
                "root",
                "",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
            return $conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}

$conexion = new ConexionBD();
$conexion->obtenerConexion();
?>
