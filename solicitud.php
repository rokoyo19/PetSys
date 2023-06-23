<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appmascotas";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["Nombre"];
    $empleo = $_POST["Empleo"];
    $apellido = $_POST["Apellido"];
    $direccion = $_POST["Dirección"];
    $telefono = $_POST["Teléfono"];
    $correo = $_POST["Correo"];
    $cedula_tipo = $_POST["country"];
    $cedula = $_POST["cedula"];
    $ingresos = $_POST["Ingresos"];

    // Consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO solicitudes_adopciones (nombre, empleo, apellido, direccion, telefono, correo, cedula_tipo, cedula, ingresos_mensuales) 
            VALUES ('$nombre', '$empleo', '$apellido', '$direccion', '$telefono', '$correo', '$cedula_tipo', '$cedula', '$ingresos')";

    if ($conn->query($sql) === TRUE) {
        // Los datos se guardaron correctamente
        header("Location: MenuUsuarios.html");
            exit();
    } else {
        // Hubo un error al guardar los datos
        echo "Error al enviar la solicitud de adopción: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
