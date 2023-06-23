<?php
$username = "root";
$password = "";
$database = "appmascotas";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Obtener el ID de la mascota desde el URL
if (isset($_GET['id'])) {
    $mascotaId = $_GET['id'];

    // Eliminar la mascota de la base de datos
    $deleteQuery = "DELETE FROM mascotas WHERE id = $mascotaId";
    $mysqli->query($deleteQuery);

    // Redireccionar a PublicarMascota.php
    header("Location: PublicarMascota.php");
    exit;
}
?>
