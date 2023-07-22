<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGENDAR CITAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- INICIO ENCABEZADO -->
    <header>
        <style>
            body {
                background-color: #064276;
            }
        </style>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Angeles de cuatro patas</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    <!-- FIN ENCABEZADO -->

    <div class="container">
        <main>
            <div>
                <style>
                    h1 {
                        text-align: center;
                        color: white;
                        font-weight: bold;
                        padding-top: 30px;
                    }
                </style>
                <h1>AGENDAR CITAS</h1>
            </div>

            <!-- Encabezados de la tabla -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="color: white">Adoptante</th>
                        <th style="color: white">Correo del Adoptante</th>
                        <th style="color: white">Mascota</th>
                        <th style="color: white">ID de la Mascota</th>
                        <th style="color: white">Fecha de Cita</th>
                        <th style="color: white">Agendar</th>
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

                    // Consulta SQL para obtener los datos de la tabla adopciones con la información de las claves foráneas, ordenados por la fecha de cita en orden ascendente
                    $sql = "SELECT adopciones.*, DATE_FORMAT(fecha_cita, '%Y-%m-%d') AS fecha_cita_format, registro.correo, registro.nombres AS adoptante, mascotas.id AS idmascota, mascotas.nombre AS mascota FROM adopciones
                            INNER JOIN registro ON adopciones.correo = registro.correo
                            INNER JOIN mascotas ON adopciones.idmascota = mascotas.id
                            ORDER BY fecha_cita_format ASC";

                    // Ejecutar la consulta
                    $result = $conn->query($sql);

                    // Verificar si hay datos para mostrar
                    if ($result->num_rows > 0) {
                        // Recorrer los resultados y mostrarlos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            // Verificar si la fecha de la cita es nula o si ya ha pasado el día de la cita
                            $fechaCita = $row['fecha_cita'];
                            if (empty($fechaCita) || strtotime($fechaCita) < time()) {
                                $fechaCita = 'null';
                            }

                            echo '<tr>';
                            echo '<td style="color: white">' . $row['adoptante'] . '</td>';
                            echo '<td style="color: white">' . $row['correo'] . '</td>';
                            echo '<td style="color: white">' . $row['mascota'] . '</td>';
                            echo '<td style="color: white">' . $row['idmascota'] . '</td>';
                            echo '<td style="color: white">' . $fechaCita . '</td>';
                            echo '<td>';
                            echo '<form method="post" action="agendar_cita.php">';
                            echo '<input type="hidden" name="adoptante" value="' . $row['adoptante'] . '">';
                            echo '<input type="hidden" name="correo" value="' . $row['correo'] . '">';
                            echo '<input type="hidden" name="mascota" value="' . $row['mascota'] . '">';
                            echo '<input type="hidden" name="idmascota" value="' . $row['idmascota'] . '">';
                            echo '<input type="date" name="fecha_cita" required>'; // Campo de texto para la fecha de la cita
                            echo '<button type="submit" class="boton-agendar">Agendar</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay citas disponibles.</td></tr>";
                    }

                    // Cerrar la conexión
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-v5i5A+2Ufta5EVb6iKt7rO4E6n7Yo/uRY2DmEIfw7s/xwnMfa6Ftz/v81Ry3EfDo" crossorigin="anonymous"></script>
</body>
</html>
