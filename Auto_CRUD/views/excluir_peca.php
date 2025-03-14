<?php
require_once "../controllers/PecaController.php";
$controller = new PecaController();

if (!isset($_GET['id'])) {
    die("ID da peça não especificado.");
}
$id = $_GET['id'];

if ($controller->delete($id)) {
    header("Location: lista_pecas.php");
    exit();
} else {
    echo "Erro ao excluir peça.";
}