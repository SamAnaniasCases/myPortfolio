<?php
class Database {
    private $host = 'db.fr-pari1.bengt.wasmernet.com';
    private $db_name = 'project2_db';
    private $username = '5cb8c5ec7359800003114b957f49';
    private $password = '06915cb8-c5ec-7503-8000-d3a1d912986b';
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
