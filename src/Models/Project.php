<?php

namespace App\Models;

use PDO;

class Project
{
    private $conn;
    private $table = 'projectmain_db';

    public function __construct()
    {
        $db = new \App\Config\Database();
        $this->conn = $db->connect();
    }

    /**
     * Read all projects
     */
    public function all()
    {
        $columns = 'id, title, category, description, image, created_at';
        $sql = "SELECT {$columns} FROM {$this->table} ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new project
     */
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (category, title, description, image) 
                VALUES (:category, :title, :description, :image)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Read a specific project by ID
     */
    public function show($id)
    {
        $sql = "SELECT id, title, category, description, image, created_at FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a project
     */
    public function update($data)
    {
        $sql = "UPDATE {$this->table} 
                SET category = :category, title = :title, description = :description, image = :image 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Delete a project
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
