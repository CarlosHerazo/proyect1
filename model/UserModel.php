<?php
require './conexion.php';

class UserModel
{


    static public function mdlRegistrarUser($nombre, $correo, $contrasena, $telefono, $direccion)
    {
        $conexion = new ConexionBD();
        $conn = $conexion->obtenerConexion();

        $stmt = $conn->prepare("INSERT INTO user (nombre, direccion, telefono, correo, contra) VALUES (:nombre, :direccion, :telefono, :correo, :contra)");

        $stmt->bindValue(":nombre", $nombre);
        $stmt->bindValue(":direccion", $direccion);
        $stmt->bindValue(":telefono", $telefono, PDO::PARAM_INT);
        $stmt->bindValue(":correo", $correo);
        $stmt->bindValue(":contra", $contrasena);

        if ($stmt->execute()) {
            return "Usuario Registrado";
        } else {
            return "Upps. Hubo un error en el Registro";
        }
    }
}
