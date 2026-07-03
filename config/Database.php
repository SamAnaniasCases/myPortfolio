<?php

namespace App\Config;

use PDO;
use PDOException;

/**
 * Database Connection Manager (PDO)
 */
class Database
{
    private $conn;

    public function connect()
    {
        $this->conn = null;

        // Load the single source of truth configuration
        $config = require __DIR__ . '/config.php';

        $host = $config['db']['host'];
        $db_name = $config['db']['dbname'];
        $username = $config['db']['username'];
        $password = $config['db']['password'];
        $port = $config['db']['port'];

        try {
            $this->conn = new PDO(
                "mysql:host={$host};port={$port};dbname={$db_name};charset=utf8mb4",
                $username,
                $password
            );
            // Enforce exception-throwing error mode
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // In production, log errors instead of echoing to prevent leakage
            error_log('Database Connection Error: ' . $e->getMessage());
            die('A database error occurred. Please try again later.');
        }

        return $this->conn;
    }
}
