<?php
$username = "root";
$password = "";
$database = "appmascotas";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Obtener el ID de la mascota desde el formulario
if (isset($_POST['id'])) {
    $mascotaId = $_POST['id'];

    // Consultar la base de datos para obtener los datos de la mascota con el ID especificado
    $query = "SELECT id, fotodelamascota FROM mascotas WHERE id = $mascotaId";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        // La mascota se encontró en la base de datos, obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $raza = $_POST['raza'];
        $edad = $_POST['edad'];
        $tamaño = $_POST['tamaño'];
        $estadosalud = $_POST['estadosalud'];
        $antecedentes = $_POST['antecedentes'];
        $especie = $_POST['especie'];

        // Verificar si se ha subido una nueva foto
       // Verificar si se ha enviado una nueva foto de mascota
if (isset($_FILES['nuevaFoto'])) {
    $fotoTemporal = $_FILES['nuevaFoto']['tmp_name'];
    $fotoNombre = $_FILES['nuevaFoto']['name'];
    $fotoDestino = "FotosMascotas/" . $fotoNombre; // Ruta de destino en el sistema de archivos

    // Mover la foto temporal al destino
    if (move_uploaded_file($fotoTemporal, $fotoDestino)) {
        echo "La nueva foto se ha guardado correctamente.";
        // Actualizar la ruta de la foto en la base de datos
        $query = "UPDATE mascotas SET fotodelamascota = '$fotoDestino' WHERE id = $mascotaId";
        $result = $mysqli->query($query);
        if (!$result) {
            echo "Error al actualizar la ruta de la foto en la base de datos.";
        }
    } else {
        echo "Error al guardar la nueva foto.";
    }
}

        // Actualizar los demás datos de la mascota en la base de datos
        $updateQuery = "UPDATE mascotas SET nombre = '$nombre', raza = '$raza', edad = $edad, tamaño = '$tamaño', estadosalud = '$estadosalud', antecedentes = '$antecedentes', especie = '$especie' WHERE id = $mascotaId";
        $mysqli->query($updateQuery);

        // Redireccionar a la página de detalles de la mascota actualizada
        header("Location: DetallesMascotaTrabajador.php?id=$mascotaId");
        exit;
    } else {
        // No se encontró una mascota con el ID especificado
        echo "<h1>No se encontró la mascota</h1>";
    }
} else {
    // No se proporcionó un ID de mascota en el formulario
    echo "<h1>No se especificó un ID de mascota</h1>";
}
?>
