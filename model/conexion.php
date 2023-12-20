<?php

class ConexionBD {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "pizzabd";
    private $conn;



    public function obtenerConexion() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch(PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public function cerrarConexion() {
        $this->conn = null;
    }
}


?>
