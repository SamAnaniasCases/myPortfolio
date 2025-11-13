<?php
class Database {
    private $host = 'db.fr-pari1.bengt.wasmernet.com';
    private $db_name = 'project_db';
    private $username = '5beec03174518000c33f2c0be1f0';
    private $password = '06915bee-c031-75d4-8000-5230ac4e65aa';
    private $port = "10272";
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
