<?php
  include '../controllers/UserController.php';
  include '../model/UserModel.php';


class UserAjax {
    public $email;
    public $contrasena;
    public $nombre;
    public $telefono;
    public $direccion;

    public function registrarUsuario() {

        $respuesta = UserController::crtRegistrarUser($this->nombre, $this->email, $this->contrasena, $this->telefono, $this->direccion);
        
        echo json_encode($respuesta);
    } 

    public function ingresarUsuario() {

        $respuesta = UserController::crtingresarUser($this->email, $this->contrasena);
        
        echo json_encode($respuesta);
    } 
}

$data = json_decode(file_get_contents("php://input"), true);


if (isset($data['action']) && $data['action'] === "registrar") {

    $insertar = new UserAjax();
    $insertar->nombre = $data["nombre"];
    $insertar->email = $data["email"];
    $insertar->contrasena = password_hash($data["contrasena"], PASSWORD_DEFAULT); // Hashing the password
    $insertar->direccion = $data["direccion"];
    $insertar->telefono = $data["telefono"];
    $insertar->registrarUsuario();
} elseif(isset($data['action']) && $data['action'] === "ingresar") {
    $ingresar = new UserAjax();
    $ingresar->email = $data["email"];
    $ingresar->contrasena  = $data["contrasena"];
    $ingresar->ingresarUsuario();
}else{
    echo json_encode(["error" => "Error en la entrada de datos"]);
}