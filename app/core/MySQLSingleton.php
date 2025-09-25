<?php
class MySQLSingleton {
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $db = "mvcplantas";   
    private $user = "root";
    private $pass = "";

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new MySQLSingleton();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
