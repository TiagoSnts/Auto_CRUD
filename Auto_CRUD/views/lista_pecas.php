<?php
require_once "../controllers/PecaController.php";
$controller = new PecaController();
$pecas = $controller->readAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Peças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Peças</h2>
        <a href="adicionar_peca.php" class="btn btn-primary mb-3">Adicionar Peça</a>
        <a href="../index.php" class="btn btn-primary mb-3">Voltar a tela inicial</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Material</th>
                    <th>Durabilidade</th>
                    <th>Marca</th>
                    <th>Original</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pecas as $peca): ?>
                    <tr>
                        <td><?= $peca['id'] ?></td>
                        <td><?= $peca['nome'] ?></td>
                        <td><?= $peca['material'] ?></td>
                        <td><?= $peca['durabilidade'] ?></td>
                        <td><?= $peca['marca'] ?></td>
                        <td><?= $peca['original'] ?></td>
                        <td><?= $peca['tipo'] ?></td>
                        <td>
                            <a href="editar_peca.php?id=<?= $peca['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="excluir_peca.php?id=<?= $peca['id'] ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
