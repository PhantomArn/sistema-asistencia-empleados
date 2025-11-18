<?php require_once ROOT_PATH . '/views/layout/header.php'; ?>

<h2>Editar Usuario: <?= htmlspecialchars($usuario['username']) ?></h2>

<form method="POST">
    <div class="mb-3">
        <label>Usuario</label>
        <input type="text" name="username" value="<?= htmlspecialchars($usuario['username']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nueva Contraseña (dejar vacío para no cambiar)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="/asistencia/public/?accion=usuarios" class="btn btn-secondary">Volver</a>
</form>

<?php require_once ROOT_PATH . '/views/layout/footer.php'; ?>