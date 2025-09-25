<?php
require_once __DIR__ . "/../core/MySQLSingleton.php";
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioDAO {
    private $conn;

    public function __construct() {
        $this->conn = MySQLSingleton::getInstance()->getConnection();
    }

    public function listar() {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function salvar(Usuario $u) {
        if ($u->id) {
            $stmt = $this->conn->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
            $stmt->execute([$u->nome, $u->email, $u->id]);
        } else {
            $stmt = $this->conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
            $stmt->execute([$u->nome, $u->email]);
        }
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }
}
