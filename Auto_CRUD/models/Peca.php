<?php
class Peca {
    private $conn;
    private $table_name = "pecas";

    public $id;
    public $nome;
    public $material;
    public $durabilidade;
    public $marca;
    public $original;
    public $tipo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar uma peça
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nome, material, durabilidade, marca, original, tipo) VALUES (:nome, :material, :durabilidade, :marca, :original, :tipo)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":material", $this->material);
        $stmt->bindParam(":durabilidade", $this->durabilidade);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":original", $this->original);
        $stmt->bindParam(":tipo", $this->tipo);
        
        return $stmt->execute();
    }

    // Listar todas as peças
    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Buscar uma peça pelo ID
    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar uma peça
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, material = :material, durabilidade = :durabilidade, marca = :marca, original = :original, tipo = :tipo WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":material", $this->material);
        $stmt->bindParam(":durabilidade", $this->durabilidade);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":original", $this->original);
        $stmt->bindParam(":tipo", $this->tipo);
        
        return $stmt->execute();
    }

    // Excluir uma peça
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>
