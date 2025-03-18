<?php
session_start();
include 'conexion.php';

// Verificar si el usuario tiene permisos para modificar
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    echo "<p>Acceso denegado.</p>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE contacto SET nombre = ?, correo = ?, telefono = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $correo, $telefono, $id);

    if ($stmt->execute()) {
        echo "<p>Contacto actualizado correctamente.</p>";
    } else {
        echo "<p>Error al actualizar el contacto.</p>";
    }
}
?>