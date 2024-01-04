<?php
class UserController {

  public static function crtRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion) {
      $respuesta = UserModel::mdlRegistrarUser($nombre, $email, $contrasena, $telefono, $direccion);   
      return $respuesta;
  }

  public static function crtingresarUser($email, $contrasena) {
    $respuesta = UserModel::mdlIngresarUser($email, $contrasena);   
    return $respuesta;
  }
}



