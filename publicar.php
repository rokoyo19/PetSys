<?php
$username = "root";
$password = "";
$database = "appmascotas";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Obtener el ID de la mascota desde el URL
if (isset($_GET['id'])) {
    $mascotaId = $_GET['id'];

    // Actualizar el estado de la mascota a 'publicado' en la base de datos
    $updateQuery = "UPDATE mascotas SET estado = 'publicado' WHERE id = $mascotaId";
    $mysqli->query($updateQuery);

    // Redireccionar a DetallesMascotaTrabajador.php
    header("Location: PublicarMascota.php?id=$mascotaId");
    exit;
}
?>
