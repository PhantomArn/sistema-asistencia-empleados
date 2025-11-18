<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // (R) Leer todos
    public function getAll() {
        $stmt = $this->db->query("SELECT id, username, created_at FROM users ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // (R) Leer por ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // (C) Crear
    public function create($data) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        return $stmt->execute([$data['username'], $hash]);
    }

    // (U) Actualizar
    public function update($id, $data) {
        if (!empty($data['password'])) {
            $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $hash = password_hash($data['password'], PASSWORD_DEFAULT);
            return $stmt->execute([$data['username'], $hash, $id]);
        } else {
            $sql = "UPDATE users SET username = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$data['username'], $id]);
        }
    }

    // (D) Eliminar
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Login (ya existía)
    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}