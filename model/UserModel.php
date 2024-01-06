<?php
require 'config.php';
require 'Conexion.php';
require '../controllers/Correo_controllers.php';
class UserModel
{
    // Método para registrar usuario
    static public function mdlRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion)
    {
        try {
            $hash = md5(uniqid(rand(), true)); // Generación del hash
            $emailMinus = strtolower($email);
            $stmt = ConexionBD::obtenerConexion()->prepare("INSERT INTO user (nombre, direccion, telefono, correo, contra, activo, hash) VALUES (:nombre, :direccion, :telefono, :correo, :contra, 0, :hash)");

            // Vinculación de parámetros
            $stmt->bindValue(":nombre", $nombre);
            $stmt->bindValue(":direccion", $direccion);
            $stmt->bindValue(":telefono", $telefono, PDO::PARAM_INT);
            $stmt->bindValue(":correo", $emailMinus);
            $stmt->bindValue(":contra", $contrasena);
            $stmt->bindValue(":hash", $hash);

            if ($stmt->execute()) {
                MailSender::sendActivationEmail($email, $nombre, $hash);
                return ["status" => "success", "hash" => $hash, "message" => "Registro exitoso"];
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
            $emailMinus = strtolower($email);
            $stmt = ConexionBD::obtenerConexion()->prepare("UPDATE user SET activo = 1, hash = NULL WHERE hash = :hash AND correo = :email");

            $stmt->bindValue(":hash", $hash);
            $stmt->bindValue(":email", $emailMinus);

            if ($stmt->execute()) {
                return "Cuenta activada con éxito";
            } else {
                return "Error al activar la cuenta";
            }
        } catch (PDOException $e) {
            return "Error en la base de datos: " . $e->getMessage();
        }
    }


    // metodo para ingresar un usuario

    static public function mdlIngresarUser($email, $contrasena)
    {
        try {
            $emailMinus = strtolower($email);
            // Preparar la sentencia SQL
            $stmt = ConexionBD::obtenerConexion()->prepare("SELECT * FROM user WHERE correo = :email");

            // Vincular el parámetro
            $stmt->bindParam(":email", $emailMinus, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el resultado
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró un usuario y la contraseña es válida
            if ($usuario && password_verify($contrasena, $usuario['contra'])) {
                $response =  array("status" => "success", "message" => "Bienvenido", "nombre" => $usuario['nombre'], "correo" => $usuario['correo'], "telefono" => $usuario['telefono'], "direccion" => $usuario['direccion']);
                // Almacenar la información en la sesión
                $_SESSION['user_info'] = $response;
                return $response;
            } else {
                return array("status" => "error", "message" => "Credenciales incorrectas");
            }
        } catch (PDOException $e) {
            return array("status" => "error", "message" => "Error al realizar la consulta: " . $e->getMessage());
        }
    }
}
