<?php
require_once __DIR__ . '/../config/database.php';

$username = 'admin';
$password = '123456';
$hash = password_hash($password, PASSWORD_DEFAULT);

$conn = conectar();
$sql = "INSERT INTO users (username, password) VALUES (?, ?) ON DUPLICATE KEY UPDATE password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $hash, $hash);

if ($stmt->execute()) {
    echo "<h3 style='color:green;'>USUARIO CREADO CORRECTAMENTE</h3>";
    echo "<p><strong>Usuario:</strong> admin</p>";
    echo "<p><strong>Contraseña:</strong> 123456</p>";
    echo "<p><a href='/asistencia/public/'>Ir al sistema</a></p>";
} else {
    echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
}
?>