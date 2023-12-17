<?php

class ConexionBD {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->conectar();
    }

    private function conectar() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function obtenerConexion() {
        return $this->conn;
    }

    public function cerrarConexion() {
        $this->conn->close();
    }
}

// Lee las variables de entorno desde el archivo .env
$envFile = 'variables.env';
if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile);
    foreach ($envVariables as $key => $value) {
        putenv("$key=$value");
    }
}

$dbHost = getenv('DB_HOST');
$dbUser = getenv('DB_USER');
$dbPass = getenv('DB_PASS');
$dbName = getenv('DB_NAME');

// Uso de la clase
$conexion = new ConexionBD($dbHost, $dbUser, $dbPass , $dbName);
$conn = $conexion->obtenerConexion();

// Realiza tus operaciones con la base de datos aquí

// Cierra la conexión al finalizar
$conexion->cerrarConexion();


