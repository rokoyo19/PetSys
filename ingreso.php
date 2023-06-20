<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appmascotas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores enviados desde el formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar el correo y la contraseña en la tabla "registro"
$sql = "SELECT * FROM registro WHERE correo = '$correo' AND contraseña = '$contrasena'";
$result = $conn->query($sql);

// Verificar si se encontró un resultado
if ($result->num_rows == 1) {
    // Las credenciales son válidas, el usuario puede iniciar sesión
    // Redirigir al usuario a la página deseada
    //header("Location: dashboard.php");
    echo "Ingreso Exitoso";
    exit();
} else {
    // Las credenciales son inválidas, mostrar un mensaje de error
    echo "Correo o contraseña incorrectos";
}

// Cerrar la conexión
$conn->close();
?>
