<?php
require_once "../controllers/ClienteController.php";
$controller = new ClienteController();
$clientes = $controller->readAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Clientes</h2>
        <a href="adicionar_cliente.php" class="btn btn-success mb-3">Adicionar Cliente</a>
        <a href="../index.php" class="btn btn-success mb-3">Voltar a tela incial</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['id'] ?></td>
                    <td><?= $cliente['nome'] ?></td>
                    <td><?= $cliente['telefone'] ?></td>
                    <td><?= $cliente['email'] ?></td>
                    <td>
                        <a href="editar_cliente.php?id=<?= $cliente['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir_cliente.php?id=<?= $cliente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
