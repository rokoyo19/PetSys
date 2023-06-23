<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se aceptaron los términos y condiciones
    if (isset($_POST["acceptTerms"])) {
        // Obtener los datos del formulario
        $nombre = $_POST["Nombre"];
        $telefono = $_POST["Telefono"];
        $apellido = $_POST["Apellido"];
        $correo = $_POST["Correo"];
        $tipoCedula = $_POST["TipoCedula"];
        $cedula = $_POST["Cedula"];
        
        // Crear una conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "appmascotas";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Verificar si la conexión fue exitosa
        if ($conn->connect_error) {
            die("Error al conectar con la base de datos: " . $conn->connect_error);
        }
        
        // Crear la consulta SQL para insertar los datos en la tabla "padrino"
        $sql = "INSERT INTO padrinos (nombre, telefono, apellido, correo, tipo_cedula, cedula) VALUES ('$nombre', '$telefono', '$apellido', '$correo', '$tipoCedula', '$cedula')";
        
        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            header("Location: MenuUsuarios.html");
            exit();
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }
        
        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Debes aceptar los términos y condiciones para continuar.";
    }
}
?>
