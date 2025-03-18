<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta SQL para verificar usuario
    $sql = "SELECT id, usuario, password, rol FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: dashboard.php"); // Redirigir al dashboard
            exit();
        } else {
            echo "<p>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p>Usuario no encontrado.</p>";
    }
}

// Función para que el administrador cree un nuevo usuario
if (isset($_POST['crear_usuario']) && $_SESSION['rol'] == 'admin') {
    $nuevo_usuario = $_POST['nuevo_usuario'];
    $nuevo_password = password_hash($_POST['nuevo_password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (usuario, password, rol) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nuevo_usuario, $nuevo_password, $rol);
    if ($stmt->execute()) {
        echo "<p>Usuario creado exitosamente.</p>";
    } else {
        echo "<p>Error al crear el usuario.</p>";
    }
}