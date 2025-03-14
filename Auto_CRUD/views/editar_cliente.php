<?php
require_once "../controllers/ClienteController.php";
$controller = new ClienteController();

if (!isset($_GET['id'])) {
    die("ID do cliente não especificado.");
}
$id = $_GET['id'];
$cliente = $controller->readOne($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = [
        "nome" => $_POST["nome"],
        "telefone" => $_POST["telefone"],
        "email" => $_POST["email"]
    ];
    if ($controller->update($id, $dados)) {
        header("Location: lista_clientes.php");
        exit();
    } else {
        echo "Erro ao atualizar cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Cliente</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?= $cliente['nome'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="<?= $cliente['telefone'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $cliente['email'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="lista_clientes.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
