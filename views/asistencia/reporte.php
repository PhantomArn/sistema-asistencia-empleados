<?php require_once ROOT_PATH . '/views/layout/header.php'; ?>

<h2>Reporte de Asistencia - <?= htmlspecialchars($fecha) ?></h2>

<form method="GET" class="form-fecha mb-3">
    <input type="hidden" name="accion" value="reporte">
    <input type="date" name="fecha" value="<?= $fecha ?>" class="form-control d-inline-block w-auto">
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Empleado</th>
            <th>Código</th>
            <th>Tipo</th>
            <th>Fecha y Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        // PDO: $asistencias es un PDOStatement
        while ($row = $asistencias->fetch(PDO::FETCH_ASSOC)): 
        ?>
            <tr>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['codigo']) ?></td>
                <td class="tipo-<?= $row['tipo'] ?>"><?= ucfirst($row['tipo']) ?></td>
                <td><?= $row['fecha_hora'] ?></td>
            </tr>
        <?php endwhile; ?>

        <?php if ($asistencias->rowCount() == 0): ?>
            <tr><td colspan="4" class="text-center">No hay registros para esta fecha.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once ROOT_PATH . '/views/layout/footer.php'; ?>