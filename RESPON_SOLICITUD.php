<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESPONDER_SOLICITUD</title>
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
                <h1>SOLICITUDES DE ADOPCIÓN</h1>
            </div>

            <!-- Encabezados de la tabla -->
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="color: white">Empleo</th>
                        <th style="color: white">Dirección</th>
                        <th style="color: white">Teléfono</th>
                        <th style="color: white">Tipo de Documento</th>
                        <th style="color: white">Cédula</th>
                        <th style="color: white">Ingresos Mensuales</th>
                        <th style="color: white">Id Mascota</th>
                        <th style="color: white">Correo</th>
                        <th style="color: white">Ver</th>
                        <th style="color: white">Aceptar</th>
                        <th style="color: white">Rechazar</th>
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

                    // Consulta SQL para obtener los datos de la tabla
                    $sql = "SELECT empleo, direccion, telefono, cedula_tipo, cedula, ingresos_mensuales, idmascota, correo, escaneo_cedula FROM solicitudes_adopciones";

                    // Ejecutar la consulta
                    $result = $conn->query($sql);

                    // Verificar si hay datos para mostrar
                    if ($result->num_rows > 0) {
                        // Recorrer los resultados y mostrarlos en la tabla
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td style="color: white">' . $row['empleo'] . '</td>';
                            echo '<td style="color: white">' . $row['direccion'] . '</td>';
                            echo '<td style="color: white">' . $row['telefono'] . '</td>';
                            echo '<td style="color: white">' . $row['cedula_tipo'] . '</td>';
                            echo '<td style="color: white">' . $row['cedula'] . '</td>';
                            echo '<td style="color: white">' . $row['ingresos_mensuales'] . '</td>';
                            echo '<td style="color: white">' . $row['idmascota'] . '</td>';
                            echo '<td style="color: white">' . $row['correo'] . '</td>';
                            echo '<td><a href="' . $row['escaneo_cedula'] . '" target="_blank" class="btn btn-primary">Ver</a></td>';
                            echo '<td>';
                            echo '<form method="post" action="aceptar_solicitud.php">';
                            echo '<input type="hidden" name="cedula" value="' . $row['cedula'] . '">';
                            echo '<button type="submit" class="btn btn-success" onclick="return confirm(\'¿Estás seguro de que deseas aceptar esta solicitud?\')">Aceptar</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '<td>';
                            echo '<form method="post" action="eliminar_solicitud.php">';
                            echo '<input type="hidden" name="cedula" value="' . $row['cedula'] . '">';
                            echo '<button type="submit" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que deseas rechazar esta solicitud?\')">Rechazar</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='11'>No hay solicitudes de adopción.</td></tr>";
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
