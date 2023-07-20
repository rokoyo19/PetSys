<?php
// Ruta de la carpeta de escaneos
$escaneosDir = "Escaneos/";

// Verificar si se recibieron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $empleo = $_POST['Empleo'] ?? '';
    $direccion = $_POST['Dirección'] ?? '';
    $telefono = $_POST['Teléfono'] ?? '';
    $tipoDocumento = $_POST['country'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $ingresos = $_POST['Ingresos'] ?? '';
    // Obtener el valor del atributo "llave" del URL y decodificarlo
    $correo = urldecode($_GET['llave']) ?? '';   
    // Obtener el valor del atributo "id" del URL y decodificarlo
    $idmascota= urldecode($_GET['id']) ?? '';   
    $llave=urldecode($_GET['llave']) ?? '';   

    // Procesar y almacenar los datos en la base de datos
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

    // Verificar si se cargó un archivo correctamente
    if (isset($_FILES["archivo_cedula"]) && $_FILES["archivo_cedula"]["error"] === 0) {
        // Obtener el tamaño del archivo
        $fileSize = $_FILES["archivo_cedula"]["size"];

        // Verificar si el tamaño del archivo es mayor que cero
        if ($fileSize > 0) {
            // Generar un nombre único para el archivo
            $filename = uniqid() . "_" . $_FILES["archivo_cedula"]["name"];

            // Mover el archivo a la carpeta de escaneos
            move_uploaded_file($_FILES["archivo_cedula"]["tmp_name"], $escaneosDir . $filename);

            // Guardar la dirección del archivo en la base de datos
            $direccionArchivo = $escaneosDir . $filename;

            // Preparar la consulta SQL
            $sql = "INSERT INTO solicitudes_adopciones (empleo, direccion, telefono, cedula_tipo, cedula, ingresos_mensuales, idmascota, correo, escaneo_cedula)
                    VALUES ('$empleo', '$direccion', '$telefono', '$tipoDocumento', '$cedula', '$ingresos', '$idmascota', '$correo','$direccionArchivo')";

            // Ejecutar la consulta
            if ($conn->query($sql) === TRUE) {
                header("Location: MenuUsuarios.php?llave=$llave");
                exit();
            } else {
                echo 'Error al registrar la solicitud de adopción: ' . $conn->error;
            }
        } else {
            echo 'Error: el archivo tiene un tamaño de cero bytes.';
        }
    } else {
        echo 'Error: no se cargó un archivo correctamente.';
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo 'Error: método de solicitud no válido.';
}
?>
