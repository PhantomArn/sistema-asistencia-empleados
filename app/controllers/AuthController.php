<?php
namespace App\Controllers;
use App\Models\User;

require_once __DIR__ . '/../models/User.php';


class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
        // session_start();
    }

    public function login() {
        $error = '';
        if ($_POST) {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $user = $this->user->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: /asistencia/public/?accion=reporte");
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos.";
            }
        }
        require_once __DIR__ . '/../../views/auth/login.php';
        // require_once ROOT_PATH . '/views/auth/login.php';
    }

    public function logout() {
        
        session_destroy();
        header("Location: /asistencia/public/");
        exit;
    }
}
?>