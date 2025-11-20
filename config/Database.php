<?php
// class Database {
//     private $host = 'db.fr-pari1.bengt.wasmernet.com';
//     private $db_name = 'project2_db';
//     private $username = '5cb8c5ec7359800003114b957f49';
//     private $password = '06915cb8-c5ec-7503-8000-d3a1d912986b';
//     private $port = "10272";
//     private $conn;

//     public function connect() {
//         $this->conn = null;
//         try {
//             $this->conn = new PDO(
//                 "mysql:host={$this->host};port={$this->port};dbname={$this->db_name}",
//                 $this->username,
//                 $this->password
//             );
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             echo 'Connection Error: ' . $e->getMessage();
//         }
//         return $this->conn;
//     }
// }

class Database {

    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;

    private $conn;

    public function __construct() {

        // Detect if running on localhost
        if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {

            // 👉 Localhost Credentials
            $this->host = 'localhost';
            $this->db_name = 'project2_db';
            $this->username = 'root';
            $this->password = '';
            $this->port = '3306';

        } else {

            // 👉 Production (Wasmer) Credentials
            $this->host = 'db.fr-pari1.bengt.wasmernet.com';
            $this->db_name = 'project2_db';
            $this->username = '5cb8c5ec7359800003114b957f49';
            $this->password = '06915cb8-c5ec-7503-8000-d3a1d912986b';
            $this->port = '10272';
        }
    }

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