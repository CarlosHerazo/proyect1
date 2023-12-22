<?php
require 'Conexion.php';

class UserModel
{
    // Método para registrar usuario
    static public function mdlRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion)
    {
        try {
            $hash = md5(uniqid(rand(), true)); // Generación del hash
            $stmt = ConexionBD::obtenerConexion()->prepare("INSERT INTO user (nombre, direccion, telefono, correo, contra, activo, hash) VALUES (:nombre, :direccion, :telefono, :correo, :contra, 0, :hash)");

            // Vinculación de parámetros
            $stmt->bindValue(":nombre", $nombre);
            $stmt->bindValue(":direccion", $direccion);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_INT);
            $stmt->bindValue(":correo", $email);
            $stmt->bindValue(":contra", $contrasena);
            $stmt->bindValue(":hash", $hash);

            if ($stmt->execute()) {
                MailSender::sendActivationEmail($email, $nombre, $hash);
                return ["status" => "success", "hash" => $hash];
            } else {
                return ["status" => "error", "message" => "Upps. Hubo un error en el Registro"];
            }
        } catch (PDOException $e) {
            return ["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()];
        }
    }

    // Método para activar la cuenta del usuario
    static public function mdlActivarUsuario($hash, $email)
    {
        try {
            $stmt = ConexionBD::obtenerConexion()->prepare("UPDATE user SET activo = 1 WHERE hash = :hash AND correo = :email");

            $stmt->bindValue(":hash", $hash);
            $stmt->bindValue(":email", $email);

            if ($stmt->execute()) {
                return "Cuenta activada con éxito";
            } else {
                return "Error al activar la cuenta";
            }
        } catch (PDOException $e) {
            return "Error en la base de datos: " . $e->getMessage();
        }
    }
}
