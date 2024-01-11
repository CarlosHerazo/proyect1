<?php
require 'config.php';
require 'Conexion.php';
require '../controllers/Correo_controllers.php';
class UserModel
{
   // Método para registrar usuario
static public function mdlRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion) {
    try {
        $conexion = ConexionBD::obtenerConexion(); // Obtener la conexión a la base de datos

        // Generación del hash único
        $hash = md5(uniqid(rand(), true));

        // Definir el rol por defecto
        $rol = 1;

        // Convertir el email a minúsculas
        $emailMinus = strtolower($email);

        // Preparar la sentencia SQL para insertar en la tabla usuario
        $stmt1 = $conexion->prepare("INSERT INTO usuarios (nombre, correo, rol, contra, activo, hash) VALUES (:nombre, :correo, :rol, :contra, 0, :hash)");

        // Vincular parámetros para la tabla usuario
        $stmt1->bindValue(":nombre", $nombre);
        $stmt1->bindValue(":correo", $emailMinus);
        $stmt1->bindValue(":rol", $rol);
        $stmt1->bindValue(":contra", $contrasena); // Aquí deberías considerar usar una función de hashing para la contraseña
        $stmt1->bindValue(":hash", $hash);

        // Ejecutar la primera sentencia
        $stmt1->execute();

        // Obtener el ID del usuario insertado
        $usuarioId = $conexion->lastInsertId();

        // Preparar la sentencia SQL para insertar en la tabla clientes
        $stmt2 = $conexion->prepare("INSERT INTO clientes (ID_Usuario, nombre, direccion, telefono) VALUES (:usuarioId, :nombre, :direccion, :telefono)");

        // Vincular parámetros para la tabla clientes
        $stmt2->bindValue(":usuarioId", $usuarioId, PDO::PARAM_INT);
        $stmt2->bindValue(":nombre", $nombre);
        $stmt2->bindValue(":direccion", $direccion);
        $stmt2->bindValue(":telefono", $telefono);

        // Ejecutar la segunda sentencia
        if ($stmt2->execute()) {
            // Enviar correo electrónico de activación
            MailSender::sendActivationEmail($email, $nombre, $hash);

            // Devolver éxito
            return ["status" => "success", "hash" => $hash, "message" => "Registro exitoso"];
        } else {
            // Devolver error en la inserción en clientes
            return ["status" => "error", "message" => "Upps. Hubo un error en el Registro"];
        }
    } catch (PDOException $e) {
        // Manejar excepción de PDO
        return ["status" => "error", "message" => "Error en la base de datos: " . $e->getMessage()];
    }
}


    // Método para activar la cuenta del usuario
    static public function mdlActivarUsuario($hash, $email)
    {
        try {
            $emailMinus = strtolower($email);
            $stmt = ConexionBD::obtenerConexion()->prepare("UPDATE usuarios SET activo = 1, hash = NULL WHERE hash = :hash AND correo = :email");

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
            $stmt = ConexionBD::obtenerConexion()->prepare("SELECT * FROM usuarios WHERE correo = :email");
            // Vincular el parámetro
            $stmt->bindParam(":email", $emailMinus, PDO::PARAM_STR);
            // Ejecutar la consulta
            $stmt->execute();


            // Obtener el resultado
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $idUsuario = $usuario['ID_Usuario'];
            
            // obtenemos resultados de clientes
            $stmt2 = ConexionBD::obtenerConexion()->prepare("SELECT * FROM clientes WHERE ID_Usuario = :idUsuario");
            $stmt2->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $stmt2->execute();
            $cliente = $stmt2->fetch(PDO::FETCH_ASSOC);

            // Verificar si se encontró un usuario y la contraseña es válida
            if ($usuario && password_verify($contrasena, $usuario['contra']) && $usuario['activo']==1) {
                $response =  array("status" => "success", "message" => "Bienvenido", "nombre" => $usuario['nombre'], "correo" => $usuario['correo'], "telefono" => $cliente['telefono'], "direccion" => $cliente['direccion'], "id_Cliente" => $cliente['ID_Cliente']);
                // Almacenar la información en la sesión
                $_SESSION['user_info'] = $response;
                return $response;
            } elseif($usuario['activo']!=1) {
                return array("status" => "error", "message" => "Por favor confirma tu cuenta");
            }else{
                return array("status" => "error", "message" => "Credenciales incorrectas");
            }
        } catch (PDOException $e) {
            return array("status" => "error", "message" => "Error al realizar la consulta: " . $e->getMessage());
        }
    }
}
