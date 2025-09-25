<?php
require_once __DIR__ . "/../dao/UsuarioDAO.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController {
    private $dao;

    public function __construct() {
        $this->dao = new UsuarioDAO();
    }

    public function index() {
        $usuarios = $this->dao->listar();
        include __DIR__ . "/../views/usuarios/listar.php";
    }

    public function criar() {
    $usuario = new Usuario("", ""); 
    include __DIR__ . "/../views/usuarios/form.php";
}
    public function editar($id) {
        $usuario = $this->dao->buscarPorId($id);
        include __DIR__ . "/../views/usuarios/form.php";
    }

    public function salvar() {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $usuario = new Usuario($nome, $email, $id);
        $this->dao->salvar($usuario);

        header("Location: /mvcPlantas/usuario");
    }

    public function deletar($id) {
        $this->dao->deletar($id);
        header("Location: /mvcPlantas/usuario");
    }
}
