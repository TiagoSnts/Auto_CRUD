<?php
require_once "../config/database.php";
require_once "../models/Peca.php";

class PecaController {
    private $db;
    private $peca;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->peca = new Peca($this->db);
    }

    public function create($data) {
        $this->peca->nome = $data["nome"];
        $this->peca->material = $data["material"];
        $this->peca->durabilidade = $data["durabilidade"];
        $this->peca->marca = $data["marca"];
        $this->peca->original = $data["original"];
        $this->peca->tipo = $data["tipo"];
        
        return $this->peca->create();
    }

    public function readAll() {
        return $this->peca->readAll()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        return $this->peca->readOne($id);
    }

    public function update($id, $data) {
        $this->peca->nome = $data["nome"];
        $this->peca->material = $data["material"];
        $this->peca->durabilidade = $data["durabilidade"];
        $this->peca->marca = $data["marca"];
        $this->peca->original = $data["original"];
        $this->peca->tipo = $data["tipo"];
        
        return $this->peca->update($id);
    }

    public function delete($id) {
        return $this->peca->delete($id);
    }
}
?>
