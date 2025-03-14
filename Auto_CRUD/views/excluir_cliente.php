<?php
require_once "../controllers/ClienteController.php";
$controller = new ClienteController();

if (!isset($_GET['id'])) {
    die("ID do cliente não especificado.");
}
$id = $_GET['id'];

if ($controller->delete($id)) {
    header("Location: lista_clientes.php");
    exit();
} else {
    echo "Erro ao excluir cliente.";
}
