<?php
require_once __DIR__ . '/../models/InscriptionModel.php';

class InscriptionController {
    private $model;

    public function __construct() {
        $this->model = new InscriptionModel();
    }

    public function getAllInscriptions() {
        return $this->model->getAll();
    }
}
