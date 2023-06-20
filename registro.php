<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "trabajador";
$password = "19092000";
$dbname = "appmascotas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$contraseña = $_POST['confirmar_contraseña'];

$sql = "INSERT INTO registro (nombres, apellidos, correo, fecha_nacimiento, contraseña)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssss", $nombres, $apellidos, $correo, $fecha_nacimiento, $contraseña);

if ($stmt->execute()) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: C:\wamp64\www\ProyectoINGsoftware\Login.html");
    exit(); // Asegurar que el script se detenga después de la redirección
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
