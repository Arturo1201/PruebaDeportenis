<?php
require_once __DIR__ . '/../models/ContactModel.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }

    public function index($page = 1) {
        $limit = 3; // Número de contactos por página
        $offset = ($page - 1) * $limit;
        $contacts = $this->contactModel->getAllContacts($offset, $limit);
        $totalContacts = $this->contactModel->getTotalContacts();
        $totalPages = ceil($totalContacts / $limit);
        
        require_once __DIR__ . '/../views/index.php';
    }
    public function new() {
        require_once __DIR__ . '/../views/new_contact.php';
    }
    public function edit($id) {
        // Obtener el contacto por ID
        $contact = $this->contactModel->getContactById($id);
    
        // Comprobar si el contacto existe
        if ($contact) {
            // Cargar la vista de edición con los datos del contacto
            require_once __DIR__ . '/../views/edit_contact.php';
        } else {
            // Si no existe, redirigir a la lista de contactos
            header('Location: /PruebaDP/public/index.php');
            exit();
        }
    }
    public function update($id, $data) {
        // Validar y actualizar los datos
        if (isset($data['nombre'], $data['domicilio'], $data['numero'], $data['colonia'], $data['ciudad'], $data['estado'], $data['telefono'], $data['email'], $data['latitud'], $data['longitud'])) {
            $this->contactModel->updateContact($id, [
                'nombre' => $data['nombre'],
                'domicilio' => $data['domicilio'],
                'numero' => $data['numero'],
                'colonia' => $data['colonia'],
                'codigo_postal' => $data['codigo_postal'],
                'ciudad' => $data['ciudad'],
                'estado' => $data['estado'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'latitud' => $data['latitud'],
                'longitud' => $data['longitud']
            ]);
        }
    
        // Redirigir a la lista de contactos después de actualizar
        header('Location: /PruebaDP/public/index.php');
        exit();
    }
    public function store($data) {
        if (isset($data['nombre'], $data['domicilio'], $data['numero'], $data['colonia'], $data['ciudad'], $data['estado'], $data['telefono'], $data['email'], $data['latitud'], $data['longitud'])) {
            $this->contactModel->createContact([
                'nombre' => $data['nombre'],
                'domicilio' => $data['domicilio'],
                'numero' => $data['numero'],
                'colonia' => $data['colonia'],
                'codigo_postal' => $data['codigo_postal'],
                'ciudad' => $data['ciudad'],
                'estado' => $data['estado'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'latitud' => $data['latitud'],
                'longitud' => $data['longitud']
            ]);
        }

        header('Location: /PruebaDP/public/index.php');
        
    }
    public function delete($id) {
        // Verifica que el ID exista en la base de datos
        $contact = $this->contactModel->getContactById($id);
    
        if ($contact) {
            // Llama al modelo para eliminar el contacto
            $this->contactModel->deleteContactById($id);
            // Redirige a la lista de contactos después de eliminar
            header('Location: /PruebaDP/public/index.php');
            exit();
        } else {
            // Si no se encuentra el contacto, redirige a la lista de contactos con un error
            header('Location: /PruebaDP/public/index.php?error=ContactoNoEncontrado');
            exit();
        }
    }
}
?>
