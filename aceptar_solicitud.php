<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió el ID de la solicitud a aceptar
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

        // Preparar la consulta SQL para obtener los datos de la solicitud a aceptar
        $sql = "SELECT * FROM solicitudes_adopciones WHERE cedula = $idSolicitud";

        // Ejecutar la consulta
        $result = $conn->query($sql);

        // Verificar si se encontraron datos para copiar
        if ($result->num_rows === 1) {
            // Obtener los datos de la solicitud
            $row = $result->fetch_assoc();

            // Preparar la consulta SQL para insertar los datos en la tabla "adopciones"
            $sqlInsert = "INSERT INTO adopciones (empleo, direccion, telefono, cedula_tipo, cedula, ingresos_mensuales, idmascota, correo, escaneo_cedula)
                         VALUES ('{$row['empleo']}', '{$row['direccion']}', '{$row['telefono']}', '{$row['cedula_tipo']}', '{$row['cedula']}', '{$row['ingresos_mensuales']}', '{$row['idmascota']}', '{$row['correo']}', '{$row['escaneo_cedula']}')";

            // Ejecutar la consulta de inserción
            if ($conn->query($sqlInsert) === TRUE) {
                // Preparar la consulta SQL para eliminar la solicitud de la tabla "solicitudes_adopciones"
                $sqlDelete = "DELETE FROM solicitudes_adopciones WHERE cedula = $idSolicitud";

                // Ejecutar la consulta de eliminación
                if ($conn->query($sqlDelete) === TRUE) {
                    // Redireccionar a la página principal después de aceptar la solicitud
                    header("Location: RESPON_SOLICITUD.php");
                    exit();
                } else {
                    echo 'Error al eliminar la solicitud: ' . $conn->error;
                }
            } else {
                echo 'Error al aceptar la solicitud: ' . $conn->error;
            }
        } else {
            echo 'No se encontró la solicitud a aceptar.';
        }

        // Cerrar la conexión
        $conn->close();
    }
} else {
    echo 'Error: método de solicitud no válido.';
}
?>
