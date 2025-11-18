<?php require_once ROOT_PATH . '/views/layout/header.php'; ?>

<h2>Crear Usuario</h2>

<form method="POST">
    <div class="mb-3">
        <label>Usuario</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Crear</button>
    <a href="/asistencia/public/?accion=usuarios" class="btn btn-secondary">Volver</a>
</form>

<?php require_once ROOT_PATH . '/views/layout/footer.php'; ?>