<?php
require_once __DIR__ . "/../core/MySQLSingleton.php";
require_once __DIR__ . "/../models/Planta.php";

class PlantaDAO {
    private $conn;

    public function __construct() {
        $this->conn = MySQLSingleton::getInstance()->getConnection();
    }

    public function listar() {
        $stmt = $this->conn->prepare("SELECT * FROM plantas");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Planta");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM plantas WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Planta");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function salvar(Planta $p) {
        if ($p->id) {
            $stmt = $this->conn->prepare("UPDATE plantas SET nome_cientifico = ?, nome_popular = ? WHERE id = ?");
            $stmt->execute([$p->nome_cientifico, $p->nome_popular, $p->id]);
        } else {
            $stmt = $this->conn->prepare("INSERT INTO plantas (nome_cientifico, nome_popular) VALUES (?, ?)");
            $stmt->execute([$p->nome_cientifico, $p->nome_popular]);
        }
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM plantas WHERE id = ?");
        $stmt->execute([$id]);
    }
}
