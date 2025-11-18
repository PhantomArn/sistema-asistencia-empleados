<?php 


require_once __DIR__ . '/../layout/header.php';?>


<h2>Marcar Asistencia</h2>

<?php if (isset($mensaje)): ?>
    <p class="mensaje <?= strpos($mensaje, 'Error') === false ? 'exito' : 'error' ?>">
        <?= $mensaje ?>
    </p>
<?php endif; ?>

<form method="POST" class="form-marcar">
    <label>Código de Empleado:</label>
    <input type="text" name="codigo" required placeholder="Ej: EMP001" autofocus>

    <!-- <label>Tipo de Marcación:</label> -->
    <div class="botones">
        <button type="submit" name="tipo" value="entrada" class="btn entrada">Entrada</button>
        <button type="submit" name="tipo" value="salida" class="btn salida">Salida</button>
    </div>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>