<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'agenda_contactos';
    private $username = 'root';  // Cambiar si tienes diferente usuario
    private $password = 'arturo1201';      // Cambiar si tienes contraseña
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>