<?php
require_once __DIR__ . '/../config/bootstrap.php';

session_start();

use App\Controllers\AsistenciaController;
use App\Controllers\AuthController;
use App\Controllers\UsuarioController;

$accion = $_GET['accion'] ?? 'index';
$protegidas = ['reporte', 'logout', 'usuarios', 'usuarios/crear', 'usuarios/editar', 'usuarios/eliminar'];

if (in_array($accion, $protegidas) && !isset($_SESSION['user_id'])) {
    header("Location: /asistencia/public/?accion=login");
    exit;
}

switch ($accion) {
    case 'login':
        (new AuthController())->login();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'reporte':
        (new AsistenciaController())->reporte();
        break;
    case 'usuarios':
        (new UsuarioController())->index();
        break;
    case 'usuarios/crear':
        (new UsuarioController())->crear();
        break;
    case 'usuarios/editar':
        (new UsuarioController())->editar();
        break;
    case 'usuarios/eliminar':
        (new UsuarioController())->eliminar();
        break;
    case 'index':
    default:
        (new AsistenciaController())->index();
        break;
}
?>