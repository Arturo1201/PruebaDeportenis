<?php
require_once __DIR__ . '/../app/controllers/ContactController.php';

$controller = new ContactController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'store') {
    $controller->store($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update') {
    $controller->update($_GET['id'], $_POST);
} elseif (isset($_GET['action']) && $_GET['action'] === 'new') {
    $controller->new();
} elseif (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $controller->edit($_GET['id']);
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $controller->delete($_GET['id']);
} else {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $controller->index($page);
}