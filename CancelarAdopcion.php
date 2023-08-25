<?php
// Obtener el valor del atributo "llave" del URL y decodificarlo
$llave = urldecode($_GET['llave']) ?? '';

// Verificar si se ha enviado el formulario de cancelar adopción
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idmascota'])) {
    // Obtener el idmascota a cancelar
    $idmascota = $_POST['idmascota'];

    // Realizar la conexión a la base de datos
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'appmascotas';

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

    // Consulta SQL para eliminar la adopción
    $sql = "DELETE FROM adopciones WHERE correo = '$llave' AND idmascota = $idmascota";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Adopción cancelada correctamente.");</script>';
    } else {
        echo '<script>alert("Error al cancelar la adopción: ' . $conn->error . '");</script>';
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar adopción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
        }
        .titulo {
            color: #FF0000; /* Color rojo */
            text-align: center; /* Centrado horizontal */
            margin-top: 20px;
        }
        .descripcion {
            color: #FFFFFF; /* Color blanco */
            text-align: center; /* Centrado horizontal */
            margin-top: 20px;
        }
        .button-container {
            display: flex;
            justify-content: center; /* Centrado horizontal */
            margin-top: 10px;
        }
        .cancelar-button {
            background-color: #FF0000; /* Color rojo */
            color: #FFFFFF; /* Color blanco */
            padding: 10px 20px; /* Espaciado interno */
            margin-left: 10px; /* Espacio a la izquierda */
        }
        .image-container {
            position: absolute;
            top: 100px;
            right: 20px;
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
                <?php
                    $llave = urldecode($_GET['llave']) ?? '';
                ?>
                <a href="MenuAdoptante.php?llave=<?php echo urlencode($llave); ?>">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                    </button>  
                </a>
            </div>
        </div>
    </header>
    <h2 class="titulo">
        CANCELAR ADOPCIÓN
    </h2>
    <!––Aquí irá la tabla con las adopciones por cancelar––>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Mascota</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Cancelar Adopción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Realizar la conexión a la base de datos
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'appmascotas';

            // Crear la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die('Error de conexión: ' . $conn->connect_error);
            }

            // Consulta SQL para obtener las adopciones por cancelar para el correo específico
            $sql = "SELECT mascotas.*, adopciones.idmascota FROM mascotas INNER JOIN adopciones ON mascotas.id = adopciones.idmascota WHERE adopciones.correo = '$llave'";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si hay datos para mostrar
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="text-white">' . $row['nombre'] . '</td>';
                    echo '<td class="text-white">' . $row['especie'] . '</td>';
                    echo '<td class="text-white">' . $row['raza'] . '</td>';
                    echo '<td>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="idmascota" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="cancelar-button">Cancelar adopción</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                // Mensaje en caso de que no haya adopciones por cancelar
                echo '<tr><td colspan="4">No hay adopciones por cancelar para este correo.</td></tr>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
