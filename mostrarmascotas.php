<?php
// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "appmascotas");

// Verificar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
    exit();
}

// Realizar la consulta para obtener los nombres de las mascotas
$query = "SELECT nombre FROM mascotas";
$resultado = mysqli_query($conexion, $query);

// Verificar si se obtuvieron resultados
if ($resultado) {
    // Crear un array para almacenar los nombres de las mascotas
    $nombresMascotas = array();

    while ($fila = mysqli_fetch_assoc($resultado)) {
        // Agregar cada nombre de mascota al array
        $nombresMascotas[] = $fila['nombre'];
    }

    // Codificar el array de nombres como JSON
    $nombresMascotasJSON = json_encode($nombresMascotas);

    // Redirigir al archivo "PublicarMascota.html" con el array de nombres en la URL
    header("Location: PublicarMascota.html?nombres=" . urlencode($nombresMascotasJSON));
    exit();
} else {
    echo "Error al obtener los nombres de las mascotas: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
