<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appmascotas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha-nacimiento'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO registro (nombres, apellidos, correo, fecha_nacimiento, contrasena)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $apellidos, $correo, $fecha_nacimiento, $contrasena);

if ($stmt->execute()) {
    // Redirigir al usuario a la página de inicio de sesión
    header("Location: Login.html");
    exit(); // Asegurar que el script se detenga después de la redirección
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
