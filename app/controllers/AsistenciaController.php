<?php
namespace App\Controllers;

use App\Models\Asistencia;

class AsistenciaController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Asistencia();
    }

    public function index() {
        $mensaje = '';
        if ($_POST) {
            $codigo = trim($_POST['codigo']);
            $tipo = $_POST['tipo'];

            $empleado = $this->modelo->obtenerEmpleadoPorCodigo($codigo);
            if ($empleado) {
                if ($this->modelo->marcar($empleado['id'], $tipo)) {
                    $mensaje = "¡Asistencia marcada como <strong>$tipo</strong> para {$empleado['nombre']}!";
                }
            } else {
                $mensaje = "Error: Código de empleado no encontrado.";
            }
        }

        // RUTA ABSOLUTA DESDE public/
        require_once __DIR__ . '/../../views/asistencia/index.php';
    }

    public function reporte() {
    $fecha = $_GET['fecha'] ?? date('Y-m-d');
    $asistencias = $this->modelo->obtenerPorFecha($fecha); // Ya es PDOStatement
    require_once ROOT_PATH . '/views/asistencia/reporte.php';
}
}