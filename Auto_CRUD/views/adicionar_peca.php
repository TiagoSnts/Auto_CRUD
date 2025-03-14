<?php
require_once "../controllers/PecaController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new PecaController();
    $dados = [
        "nome" => $_POST["nome"],
        "material" => $_POST["material"],
        "durabilidade" => $_POST["durabilidade"],
        "marca" => $_POST["marca"],
        "original" => $_POST["original"],
        "tipo" => $_POST["tipo"]
    ];
    
    if ($controller->create($dados)) {
        header("Location: lista_pecas.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Peça</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Peça</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Material:</label>
                <input type="text" name="material" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Durabilidade:</label>
                <input type="text" name="durabilidade" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Marca:</label>
                <input type="text" name="marca" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Original:</label>
                <select name="original" class="form-control">
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tipo:</label>
                <select name="tipo" class="form-control">
                    <option value="Carro">Carro</option>
                    <option value="Moto">Moto</option>
                    <option value="Caminhão">Caminhão</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="lista_pecas.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
