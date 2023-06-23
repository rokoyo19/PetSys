<!DOCTYPE html>
<html>
<head>
    <title>Editar Mascota</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
        }

        .header {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .form-container {
            margin-top: 10px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 250px;
        }

        label {
            color: white;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        select {
            padding: 5px;
            width: 250px;
            margin-bottom: 10px;
        }

        input[type="number"] {
            padding: 5px;
            width: 250px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #00f6f8;
            color: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .corner-button {
            position: absolute;
            top: 90px;
            right: 10px;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Angeles de cuatro patas</strong>
                </div>
                <a href="MenuTrabajadores.html">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                    </button>  
                </a>
            </div>
        </div>
    </header>

    <div class="form-container">
        
        </form>
        
    </div>
    <?php
$username = "root";
$password = "";
$database = "appmascotas";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Obtener el ID de la mascota desde la URL
if (isset($_GET['id'])) {
    $mascotaId = $_GET['id'];

    // Consultar la base de datos para obtener los datos de la mascota con el ID especificado
    $query = "SELECT id, nombre, raza, edad, fotodelamascota, tamaño, estadosalud, antecedentes, especie, estado FROM mascotas WHERE id = $mascotaId";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        // La mascota se encontró en la base de datos, mostrar los datos
        $mascota = $result->fetch_assoc();
        $id = $mascota['id'];
        $nombre = $mascota['nombre'];
        $raza = $mascota['raza'];
        $edad = $mascota['edad'];
        $fotodelamascota = $mascota['fotodelamascota'];
        $tamaño = $mascota['tamaño'];
        $estadosalud = $mascota['estadosalud'];
        $antecedentes = $mascota['antecedentes'];
        $especie = $mascota['especie'];
        $estado = $mascota['estado'];

        // Mostrar la imagen de la mascota centrada y fuera del recuadro blanco
        echo "<div style='text-align: center;'>";
        echo "<img src='$fotodelamascota' alt='Foto de la mascota' style='max-width: 300px; max-height: 300px;'>";
        echo "</div>";

        // Mostrar los datos de la mascota en campos de texto editables centrados con espaciado reducido
        echo "<div style='text-align: center;'>";
        echo "<form action='actualizarmascota.php?id=$id' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<div style='display: flex; justify-content: center; align-items: center; flex-direction: column; line-height: 0.8;'>"; // Estilos para centrar los elementos y reducir el espaciado entre líneas
        echo "<label style='text-align: center;'>Nombre:</label><br>";
        echo "<input type='text' name='nombre' value='$nombre'><br>";
        echo "<label style='text-align: center;'>Raza:</label><br>";
        echo "<input type='text' name='raza' value='$raza'><br>";
        echo "<label style='text-align: center;'>Edad:</label><br>";
        echo "<input type='text' name='edad' value='$edad'><br>";
        echo "<label style='text-align: center;'>Tamaño:</label><br>";
        echo "<input type='text' name='tamaño' value='$tamaño'><br>";
        echo "<label style='text-align: center;'>Estado de Salud:</label><br>";
        echo "<input type='text' name='estadosalud' value='$estadosalud'><br>";
        echo "<label style='text-align: center;'>Antecedentes:</label><br>";
        echo "<textarea name='antecedentes'>$antecedentes</textarea><br>";
        echo "<label style='text-align: center;'>Especie:</label><br>";
        echo "<input type='text' name='especie' value='$especie'><br>";

        // Botón para subir nueva foto de mascota centrado
        echo "<label style='text-align: center;'>Nueva foto de la mascota:</label><br>";
        echo "<input type='file' name='nuevaFoto'><br>";

        // Botón para guardar cambios centrado
        echo "<input type='submit' value='Guardar cambios' style='text-align: center;'><br>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        // Verificar si se ha enviado una nueva foto de mascota
        if (isset($_FILES['nuevaFoto'])) {
            $fotoTemporal = $_FILES['nuevaFoto']['tmp_name'];
            $fotoDestino = "ruta/destino/nuevaFoto.jpg"; // Reemplaza 'ruta/destino' con la ubicación deseada

            // Mover la foto temporal al destino
            if (move_uploaded_file($fotoTemporal, $fotoDestino)) {
                echo "La nueva foto se ha guardado correctamente.";
                // Actualizar la ruta de la foto en la base de datos si es necesario
                // ...
            } else {
                echo "Error al guardar la nueva foto.";
            }
        }

        // Botón en la esquina superior derecha para borrar la mascota
        echo "<div style='text-align: right; margin-top: 20px;'>";
        echo "<a href='borrarmascota.php?id=$id' class='corner-button'>";
        echo "<img src='https://cdn-icons-png.flaticon.com/512/5496/5496335.png' alt='Botón de imagen' width='50' height='50'>";
        echo "</a>";
        echo "</div>";
    } else {
        // No se encontró una mascota con el ID especificado
        echo "<h1>No se encontró la mascota</h1>";
    }
}
?>

