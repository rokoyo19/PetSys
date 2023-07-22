<?php
// Verificar que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST["correo"];
    $idMascota = $_POST["idmascota"];
    $fechaCita = $_POST["fecha_cita"];

    // Realizar la conexión a la base de datos
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'appmascotas';

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

    // Actualizar el registro en la tabla adopciones con la fecha de la cita
    $sql = "UPDATE adopciones SET fecha_cita = '$fechaCita' WHERE correo = '$correo' AND idmascota = '$idMascota'";
    if ($conn->query($sql) === TRUE) {
        header('Location: AGENDAR_CITAS.php');
        exit;;
    } else {
        echo "Error al agendar la cita: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
