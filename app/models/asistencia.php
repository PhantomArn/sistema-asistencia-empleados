<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Asistencia {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Ya es PDO
    }

    public function marcar($empleado_id, $tipo) {
        $sql = "INSERT INTO asistencias (empleado_id, tipo) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$empleado_id, $tipo]);
    }

   public function obtenerPorFecha($fecha) {
    $sql = "SELECT e.nombre, e.codigo, a.tipo, a.fecha_hora 
            FROM asistencias a 
            JOIN empleados e ON a.empleado_id = e.id 
            WHERE DATE(a.fecha_hora) = ? 
            ORDER BY a.fecha_hora";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$fecha]);
    return $stmt; // Devuelve PDOStatement
}

    public function obtenerEmpleadoPorCodigo($codigo) {
        $sql = "SELECT * FROM empleados WHERE codigo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}