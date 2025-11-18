<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/asistencia/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/asistencia/public/">Asistencia</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/asistencia/public/">Marcar</a>
                <a class="nav-link" href="/asistencia/public/?accion=reporte">Reporte</a>
                <a class="nav-link" href="/asistencia/public/?accion=usuarios">Usuarios</a>
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="nav-link text-white">Hola, <?= $_SESSION['username'] ?></span>
                    <a class="nav-link" href="/asistencia/public/?accion=logout">Salir</a>
                <?php else: ?>
                    <a class="nav-link" href="/asistencia/public/?accion=login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container">