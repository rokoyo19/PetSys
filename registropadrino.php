<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se aceptaron los términos y condiciones
    if (isset($_POST["acceptTerms"])) {
        // Obtener los datos del formulario
        $telefono = $_POST["Telefono"];
        $tipoCedula = $_POST["TipoCedula"];
        $cedula = $_POST["Cedula"];
        // Obtener el valor del atributo "llave" del URL y decodificarlo
        $correo = urldecode($_GET['llave']) ?? '';   
        // Obtener el valor del atributo "id" del URL y decodificarlo
        $idmascota= urldecode($_GET['id']) ?? '';   
        $llave=urldecode($_GET['llave']) ?? '';   
        
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
        if(empty($telefono)!= true and empty($tipoCedula)!= true and empty($cedula)!=true){
        // Crear la consulta SQL para insertar los datos en la tabla "padrino"
        $sql = "INSERT INTO padrinos (telefono, correo, tipo_cedula, cedula, idmascota) VALUES ('$telefono', '$correo', '$tipoCedula', '$cedula', '$idmascota')";
        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            header("Location: MenuUsuarios.php?llave=$llave");
            exit();
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }
        }else{
            echo "Error no se registraron los datos: " . $conn->error;
        }
        
        
        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Debes aceptar los términos y condiciones para continuar.";
    }
}
?>
