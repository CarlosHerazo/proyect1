<?php
require 'Conexion.php';

class UserModel
{

    static public function mdlRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion)
    {
        try {
            $stmt = ConexionBD::obtenerConexion()->prepare("INSERT INTO user (nombre, direccion, telefono, correo, contra) VALUES (:nombre, :direccion, :telefono, :correo, :contra)");
    
            $stmt->bindValue(":nombre", $nombre);
            $stmt->bindValue(":direccion", $direccion);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_INT);
            $stmt->bindValue(":correo", $email);
            $stmt->bindValue(":contra", $contrasena);
    
            if ($stmt->execute()) {
                return "Usuario Registrado";
            } else {
                return "Upps. Hubo un error en el Registro";
            }
        } catch (PDOException $e) {
            return "Error en la base de datos: " . $e->getMessage();
        }
    }
    
}
