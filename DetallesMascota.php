<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        #info-box {
            background-color: white;
            color: black;
            text-align: left;
            width: 1200px;
            padding: 10px;
            margin-top: 50px;
        }

        #buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            background-color: #00ffff;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Angeles de cuatro patas</strong>
                </a>
                <div class="button-group">
                <?php
    // Obtener el valor del atributo "llave" del URL y decodificarlo
    $llave = urldecode($_GET['llave']) ?? '';?>
                    <a href="CATALOGO.php?llave=<?php echo urlencode($llave); ?>">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                    </a>
                    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
                </div>
            </div>
        </div>
    </header>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    $llave = urldecode($_GET['llave']) ?? '';
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

        // Mostrar la imagen de la mascota centrada y cuadrada con enlace para ampliar
        echo "<div style='text-align: center;'>";
        echo "<a href='$fotodelamascota' target='_blank'>";
        echo "<img src='$fotodelamascota' alt='Foto de la mascota' style='max-width: 300px; max-height: 300px; object-fit: cover;'>";
        echo "</a>";
        echo "</div>";

        // Mostrar los datos de la mascota en un recuadro blanco más pequeño
        echo "<div style='background-color: white; padding: 10px; border: 1px solid black; text-align: center; width: 400px; margin: 20px auto;'>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Raza: $raza</p>";
        echo "<p>Edad: $edad años</p>";
        echo "<p>Tamaño: $tamaño</p>";
        echo "<p>Estado de salud: $estadosalud</p>";
        echo "<p>Antecedentes: $antecedentes</p>";
        echo "<p>Especie: $especie</p>";

        // Separar los botones "Adoptar" y "Apadrinar" en diferentes líneas
        echo "<div style='display: flex; justify-content: space-between; margin-top: 10px;'>";
        echo "<a href='Apadrinamiento.php?id=$id&llave=$llave'>";
        echo "<button class='button'>Apadrinar</button>";
        echo "</a>";
        echo "<a href='Adoptar.php?id=$id&llave=$llave'>";
        echo "<button class='button'>Adoptar</button>";
        echo "</a>";
        echo "</div>";

        echo "</div>";
    } else {
        // No se encontró una mascota con el ID especificado
        echo "<h1>No se encontró la mascota</h1>";
    }
} else {
    // No se proporcionó un ID de mascota en la URL
    echo "<h1>No se especificó un ID de mascota</h1>";
}
?>






</body>
</html>
