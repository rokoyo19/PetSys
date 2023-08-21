<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'appmascotas';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Obtener el valor del atributo "llave" del URL
$llave = urldecode($_GET['llave']) ?? '';
$correoUsuario = $llave;

// Obtener los valores del formulario
$idmascota = $_POST['mascota']; // Aquí usaremos el idmascota en lugar del nombre de la mascota
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Consulta para obtener el idmascota basado en el nombre de la mascota seleccionada
$sql_idmascota = "SELECT id FROM mascotas WHERE nombre = '$idmascota'";
$result_idmascota = $conn->query($sql_idmascota);

if ($result_idmascota->num_rows > 0) {
    $row_idmascota = $result_idmascota->fetch_assoc();
    $idmascota = $row_idmascota['id']; // Ahora tenemos el idmascota
}

// Consulta para insertar los datos en la tabla visita_padrino
$sql_insert = "INSERT INTO visita_padrino (correo, idmascota, fecha, hora) VALUES ('$correoUsuario', '$idmascota', '$fecha', '$hora')";

if ($conn->query($sql_insert) === TRUE) {
    header("Location: VISITA_PADRINO.php?llave=$llave");
    exit();
} else {
    echo "Error al agendar la visita: " . $conn->error;
}

$conn->close();
?>
