<?php
// Establecer la conexión con la base de datos (ajusta los valores según tu configuración)
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'appmascotas';

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$raza = $_POST['raza'];
$tamaño = $_POST['tamaño'];
$estado_salud = $_POST['Estado_de_salud'];
$antecedentes = $_POST['Antecedentes'];
$especie = $_POST['especie'];

// Procesar la foto de la mascota (guardar en una ubicación específica)
$directorio_destino = 'C:\wamp64\www\mascotas\FotosMascotas'; // Ruta donde se guardará la foto
$foto_nombre = $_FILES['foto']['name'];
$foto_temporal = $_FILES['foto']['tmp_name'];
$foto_destino = $directorio_destino . '/' . $foto_nombre;

if (move_uploaded_file($foto_temporal, $foto_destino)) {
    // La foto se subió correctamente, ahora puedes guardar el resto de los datos en la base de datos

    // Crear la consulta SQL para insertar los datos en la tabla "mascotas"
    $consulta = "INSERT INTO mascotas (fotodelamascota, nombre, edad, raza, tamaño, estadosalud, antecedentes, especie) VALUES ('$foto_nombre', '$nombre', $edad, '$raza', '$tamaño', '$estado_salud', '$antecedentes', '$especie')";

    // Ejecutar la consulta
    if ($conn->query($consulta) === TRUE) {
        // Registro insertado correctamente
        echo "Mascota registrada exitosamente.";
    } else {
        // Error al insertar el registro
        echo "Error al registrar la mascota: " . $conn->error;
    }
} else {
    // Error al subir la foto
    echo "Error al subir la foto de la mascota.";
}

// Cerrar la conexión
$conn->close();
?>
