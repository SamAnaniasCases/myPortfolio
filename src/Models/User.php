<?php

namespace App\Models;

use PDO;

class User
{
    private $conn;
    private $table = 'user_form';

    public function __construct()
    {
        $db = new \App\Config\Database();
        $this->conn = $db->connect();
    }

    /**
     * Find user by username
     */
    public function findByName($name)
    {
        $sql = "SELECT id, name, email, password FROM {$this->table} WHERE name = :name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Find user by email
     */
    public function findByEmail($email)
    {
        $sql = "SELECT id, name, email, password FROM {$this->table} WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Create/Register a new user
     */
    public function create($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'name'     => $name,
            'email'    => $email,
            'password' => $hashedPassword
        ]);
    }
}
