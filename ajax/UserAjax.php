<?php
  include '../controllers/UserController.php';
  include '../model/UserModel.php';


class UserAjax {
    public $correo;
    public $contrasena;
    public $nombre;
    public $telefono;
    public $direccion;

    public function registrarUsuario() {
        $respuesta = UserController::crtRegistrarUser($this->nombre, $this->correo, $this->contrasena, $this->telefono, $this->direccion);
        echo json_encode($respuesta);
    } 
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['action']) && $data['action'] === "registrar") {
  
    $insertar = new UserAjax();
    $insertar->nombre = $data["nombre"];
    $insertar->correo = $data["email"];
    $insertar->contrasena = password_hash($data["contrasena"], PASSWORD_DEFAULT); // Hashing the password
    $insertar->direccion = $data["direccion"];
    $insertar->telefono = $data["telefono"];
    echo $data["nombre"];
    echo("Nombre: " . $insertar->nombre);

    $insertar->registrarUsuario();
} else {
    // echo json_encode(["error" => "Error en el registro"]);
}


