<?php require_once ROOT_PATH . '/views/layout/header.php'; ?>

<h2>Gestión de Usuarios</h2>

<?php if ($mensaje): ?>
    <div class="alert alert-success"><?= htmlspecialchars($mensaje) ?></div>
<?php endif; ?>

<a href="/asistencia/public/?accion=usuarios/crear" class="btn btn-primary mb-3">+ Nuevo Usuario</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Fecha Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= $u['created_at'] ?></td>
                <td>
                    <a href="/asistencia/public/?accion=usuarios/editar&id=<?= $u['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="/asistencia/public/?accion=usuarios/eliminar&id=<?= $u['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once ROOT_PATH . '/views/layout/footer.php'; ?>