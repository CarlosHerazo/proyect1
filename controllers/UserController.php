<?php
   
class UserController {

  public static function crtRegistrarUser($nombre, $correo, $contrasena, $telefono, $direccion) {
      $respuesta = UserModel::mdlRegistrarUser($nombre, $correo, $contrasena, $telefono, $direccion);
      
      return $respuesta;
  }
}



