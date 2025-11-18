<?php
namespace App\Controllers;

use App\Models\User;

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new User();
        $this->checkLogin();
    }

  private function checkLogin() {
    // session_start() ya está en public/index.php → NO LO REPITAS
    if (!isset($_SESSION['user_id'])) {
        header("Location: /asistencia/public/?accion=login");
        exit;
    }
}

    // LISTAR
    public function index() {
        $usuarios = $this->model->getAll();
        $mensaje = $_SESSION['mensaje'] ?? '';
        unset($_SESSION['mensaje']);
        require_once ROOT_PATH . '/views/usuarios/index.php';
    }

    // CREAR
    public function crear() {
        if ($_POST) {
            if ($this->model->create($_POST)) {
                $_SESSION['mensaje'] = "Usuario creado con éxito.";
                header("Location: /asistencia/public/?accion=usuarios");
                exit;
            } else {
                $error = "Error al crear usuario.";
            }
        }
        require_once ROOT_PATH . '/views/usuarios/crear.php';
    }

    // EDITAR
    public function editar() {
        $id = $_GET['id'] ?? 0;
        $usuario = $this->model->getById($id);

        if (!$usuario) {
            $_SESSION['mensaje'] = "Usuario no encontrado.";
            header("Location: /asistencia/public/?accion=usuarios");
            exit;
        }

        if ($_POST) {
            if ($this->model->update($id, $_POST)) {
                $_SESSION['mensaje'] = "Usuario actualizado.";
                header("Location: /asistencia/public/?accion=usuarios");
                exit;
            } else {
                $error = "Error al actualizar.";
            }
        }
        require_once ROOT_PATH . '/views/usuarios/editar.php';
    }

    // ELIMINAR
    public function eliminar() {
        $id = $_GET['id'] ?? 0;
        if ($this->model->delete($id)) {
            $_SESSION['mensaje'] = "Usuario eliminado.";
        } else {
            $_SESSION['mensaje'] = "Error al eliminar.";
        }
        header("Location: /asistencia/public/?accion=usuarios");
        exit;
    }
}