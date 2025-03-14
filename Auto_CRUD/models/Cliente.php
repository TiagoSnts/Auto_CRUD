<?php
require_once "../config/Database.php";

class Cliente {
    private $conn;
    private $table = "clientes";

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function create($data) {
        $sql = "INSERT INTO $this->table (nome, telefone, email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['nome'], $data['telefone'], $data['email']]);
    }

    public function readAll() {
        $sql = "SELECT * FROM $this->table";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE $this->table SET nome = ?, telefone = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['nome'], $data['telefone'], $data['email'], $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
