<?php
require_once __DIR__ . "/../dao/PlantaDAO.php";
require_once __DIR__ . "/../models/Planta.php";

class PlantaController {
    private $dao;

    public function __construct() {
        $this->dao = new PlantaDAO();
    }

    public function index() {
        $plantas = $this->dao->listar();
        include __DIR__ . "/../views/plantas/listar.php";
    }

    public function criar() {
        $planta = new Planta("", "");
        include __DIR__ . "/../views/plantas/form.php";
    }

    public function editar($id) {
        $planta = $this->dao->buscarPorId($id);
        include __DIR__ . "/../views/plantas/form.php";
    }

    public function salvar() {
        $id = $_POST['id'] ?? null;
        $nome_cientifico = $_POST['nome_cientifico'];
        $nome_popular    = $_POST['nome_popular'];

        $planta = new Planta($nome_cientifico, $nome_popular, $id);
        $this->dao->salvar($planta);

        header("Location: /mvcPlantas/planta");
        exit;
    }

    public function deletar($id) {
        $this->dao->deletar($id);
        header("Location: /mvcPlantas/planta");
        exit;
    }
}
