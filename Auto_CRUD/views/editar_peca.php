<?php
require_once "../controllers/PecaController.php";
$controller = new PecaController();

if (!isset($_GET['id'])) {
    die("ID da peça não especificado.");
}
$id = $_GET['id'];
$peca = $controller->readOne($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dados = [
        "nome" => $_POST["nome"],
        "material" => $_POST["material"],
        "durabilidade" => $_POST["durabilidade"],
        "marca" => $_POST["marca"],
        "original" => $_POST["original"],
        "tipo" => $_POST["tipo"]
    ];
    if ($controller->update($id, $dados)) {
        header("Location: lista_pecas.php");
        exit();
    } else {
        echo "Erro ao atualizar peça.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Peça</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Peça</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?= $peca['nome'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Material:</label>
                <input type="text" name="material" value="<?= $peca['material'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Durabilidade:</label>
                <input type="text" name="durabilidade" value="<?= $peca['durabilidade'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Marca:</label>
                <input type="text" name="marca" value="<?= $peca['marca'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Original:</label>
                <select name="original" class="form-control">
                    <option value="Sim" <?= ($peca['original'] == "Sim") ? "selected" : "" ?>>Sim</option>
                    <option value="Não" <?= ($peca['original'] == "Não") ? "selected" : "" ?>>Não</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tipo:</label>
                <select name="tipo" class="form-control">
                    <option value="Carro" <?= ($peca['tipo'] == "Carro") ? "selected" : "" ?>>Carro</option>
                    <option value="Moto" <?= ($peca['tipo'] == "Moto") ? "selected" : "" ?>>Moto</option>
                    <option value="Caminhão" <?= ($peca['tipo'] == "Caminhão") ? "selected" : "" ?>>Caminhão</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="lista_pecas.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
