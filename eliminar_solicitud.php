<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el ID de la solicitud a eliminar
    if (isset($_POST['cedula'])) {
        $idSolicitud = $_POST['cedula'];

        // Conexión a la base de datos (debes completar los datos de conexión)
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

        // Preparar la consulta SQL para eliminar la solicitud por su ID
        $sql = "DELETE FROM solicitudes_adopciones WHERE cedula = $idSolicitud";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Redireccionar a la página principal después de eliminar la solicitud
            header("Location: RESPON_SOLICITUD.php");
            exit();
        } else {
            echo 'Error al eliminar la solicitud: ' . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
} else {
    echo 'Error: método de solicitud no válido.';
}
?>
