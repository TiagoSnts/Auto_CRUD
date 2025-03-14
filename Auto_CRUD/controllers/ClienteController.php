<?php
require_once "../models/Cliente.php";

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function readAll() {
        return $this->model->readAll();
    }

    public function readOne($id) {
        return $this->model->readOne($id);
    }

    public function update($id, $data) {
        return $this->model->update($id, $data);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}
