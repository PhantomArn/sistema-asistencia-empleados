<?php 
require_once __DIR__ . '/../layout/header.php'; 
?>
<div class="login-box">
    <h2>Iniciar Sesión</h2>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Usuario:</label>
        <input type="text" name="username" required placeholder="admin" autofocus>

        <label>Contraseña:</label>
        <input type="password" name="password" required placeholder="123456">

        <button type="submit" class="btn-login">Ingresar</button>
    </form>

    <!-- <p><small>Usuario: <strong>admin</strong> | Pass: <strong>123456</strong></small></p> -->
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>