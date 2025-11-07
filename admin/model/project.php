<?php
require_once __DIR__ . '/../../config/Database.php';

class Project {
    private $conn;
    private $table = 'projectmain_db';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // READ ALL
    public function all() {
        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // CREATE
    public function create($data) {
        $sql = "INSERT INTO {$this->table} (category, title, description, image) 
                VALUES (:category, :title, :description, :image)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // READ ONE
    public function show($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($data) {
        $sql = "UPDATE {$this->table} 
                SET category = :category, title = :title, description = :description, image = :image 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // DELETE
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>
