<?php
require_once __DIR__ . "/../dao/CuidadoDAO.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";
require_once __DIR__ . "/../dao/PlantaDAO.php";
require_once __DIR__ . "/../models/Cuidado.php";

class CuidadoController {
    private $dao;
    private $usuarioDao;
    private $plantaDao;

    public function __construct() {
        $this->dao = new CuidadoDAO();
        $this->usuarioDao = new UsuarioDAO();
        $this->plantaDao = new PlantaDAO();
    }

    public function index() {
        $cuidados = $this->dao->listar();
        include __DIR__ . "/../views/cuidados/listar.php";
    }

    public function criar() {
        $cuidado = new Cuidado("", "", "", "");
        $usuarios = $this->usuarioDao->listar();
        $plantas  = $this->plantaDao->listar();
        include __DIR__ . "/../views/cuidados/form.php";
    }

    public function editar($id) {
        $cuidado  = $this->dao->buscarPorId($id);
        $usuarios = $this->usuarioDao->listar();
        $plantas  = $this->plantaDao->listar();
        include __DIR__ . "/../views/cuidados/form.php";
    }

    public function salvar() {
        $id           = $_POST['id'] ?? null;
        $usuario_id   = $_POST['usuario_id'] ?? '';
        $planta_id    = $_POST['planta_id'] ?? '';
        $tipo_cuidado = $_POST['tipo_cuidado'] ?? '';
        $frequencia   = $_POST['frequencia'] ?? '';

        $cuidado = new Cuidado($usuario_id, $planta_id, $tipo_cuidado, $frequencia, $id);
        $this->dao->salvar($cuidado);

        header("Location: /mvcPlantas/cuidado");
        exit;
    }

    public function deletar($id) {
        $this->dao->deletar($id);
        header("Location: /mvcPlantas/cuidado");
        exit;
    }
}
