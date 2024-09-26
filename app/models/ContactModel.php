<?php
require_once __DIR__ . '/../../config/database.php';

class ContactModel {
    private $conn;
    private $table = 'contactos';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllContacts($offset, $limit) {
        $query = "SELECT * FROM " . $this->table . " LIMIT :offset, :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalContacts() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->conn->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function createContact($data) {
        $query = "INSERT INTO " . $this->table . " (nombre, domicilio, numero, colonia, codigo_postal, ciudad, estado, telefono, email, latitud, longitud)
                  VALUES (:nombre, :domicilio, :numero, :colonia, :codigo_postal, :ciudad, :estado, :telefono, :email, :latitud, :longitud)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', htmlspecialchars(strip_tags($data['nombre'])));
        $stmt->bindParam(':domicilio', htmlspecialchars(strip_tags($data['domicilio'])));
        $stmt->bindParam(':numero', htmlspecialchars(strip_tags($data['numero'])));
        $stmt->bindParam(':colonia', htmlspecialchars(strip_tags($data['colonia'])));
        $stmt->bindParam(':codigo_postal', htmlspecialchars(strip_tags($data['codigo_postal'])));
        $stmt->bindParam(':ciudad', htmlspecialchars(strip_tags($data['ciudad'])));
        $stmt->bindParam(':estado', htmlspecialchars(strip_tags($data['estado'])));
        $stmt->bindParam(':telefono', htmlspecialchars(strip_tags($data['telefono'])));
        $stmt->bindParam(':email', htmlspecialchars(strip_tags($data['email'])));
        $stmt->bindParam(':latitud', htmlspecialchars(strip_tags($data['latitud'])));
        $stmt->bindParam(':longitud', htmlspecialchars(strip_tags($data['longitud'])));
        return $stmt->execute();
    }
    public function getContactById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM contactos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateContact($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE contactos
            SET nombre = :nombre, domicilio = :domicilio, numero = :numero, colonia = :colonia,
                codigo_postal = :codigo_postal, ciudad = :ciudad, estado = :estado,
                telefono = :telefono, email = :email, latitud = :latitud, longitud = :longitud
            WHERE id = :id
        ");
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':domicilio', $data['domicilio']);
        $stmt->bindParam(':numero', $data['numero']);
        $stmt->bindParam(':colonia', $data['colonia']);
        $stmt->bindParam(':codigo_postal', $data['codigo_postal']);
        $stmt->bindParam(':ciudad', $data['ciudad']);
        $stmt->bindParam(':estado', $data['estado']);
        $stmt->bindParam(':telefono', $data['telefono']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':latitud', $data['latitud']);
        $stmt->bindParam(':longitud', $data['longitud']);
    
        $stmt->execute();
    }
    public function deleteContactById($id) {
        $stmt = $this->conn->prepare("DELETE FROM contactos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
