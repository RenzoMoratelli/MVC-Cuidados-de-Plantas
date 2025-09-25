<?php
require_once __DIR__ . "/../core/MySQLSingleton.php";
require_once __DIR__ . "/../models/Cuidado.php";

class CuidadoDAO {
    private $conn;

    public function __construct() {
        $this->conn = MySQLSingleton::getInstance()->getConnection();
    }

    public function listar() {
        $stmt = $this->conn->prepare("SELECT * FROM cuidados");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Cuidado");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM cuidados WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Cuidado");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function salvar(Cuidado $c) {
        if ($c->id) {
            $stmt = $this->conn->prepare("UPDATE cuidados SET usuario_id = ?, planta_id = ?, tipo_cuidado = ?, frequencia = ? WHERE id = ?");
            $stmt->execute([$c->usuario_id, $c->planta_id, $c->tipo_cuidado, $c->frequencia, $c->id]);
        } else {
            $stmt = $this->conn->prepare("INSERT INTO cuidados (usuario_id, planta_id, tipo_cuidado, frequencia) VALUES (?, ?, ?, ?)");
            $stmt->execute([$c->usuario_id, $c->planta_id, $c->tipo_cuidado, $c->frequencia]);
        }
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM cuidados WHERE id = ?");
        $stmt->execute([$id]);
    }
}
