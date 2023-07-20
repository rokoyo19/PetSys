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

// Inicializar la variable de mensaje de error
$error_message = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados desde el formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar el correo y la contraseña en la tabla "registro"
    $sql = "SELECT * FROM registro WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    // Verificar si se encontró un resultado
    if ($result->num_rows == 1) {
        // Las credenciales son válidas, el usuario puede iniciar sesión
        // Obtener la fila de la consulta
        $row = $result->fetch_assoc();

        // Obtener la clave correspondiente al correo electrónico
        $clave = $row['clave'];
            if($correo=='trabajador@angeles.com' and $result->num_rows == 1){
                header("Location: MenuTrabajadores.html");
                exit();}
            else{
        // Redirigir al usuario a la página deseada con la clave como parámetro GET
        header("Location: MenuUsuarios.php?llave=$correo");
        exit();}
    } else {
        // Las credenciales son inválidas, mostrar un mensaje de error
        $error_message = "Correo o contraseña incorrectos";
        header("Location: Login.html");
        exit();
    }
}
// Cerrar la conexión
$conn->close();
?>
