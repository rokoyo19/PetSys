<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PROCESO ADOPTAR</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            body {
                background-color: #064276;
                color: white; /* Color de texto blanco */
            }
            .white-text {
                color: white;
            }
            table {
                color: white; /* Color de texto blanco en la tabla */
            }
        </style>
</head>

<body>
    <header>
        <style>
            body {
                background-color: #064276;
            }
        </style>

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

    <div>
                <style>
                    h1 {
                        text-align: center;
                        color: white;
                        font-weight: bold;
                        padding-top: 30px;
                    }
                </style>
                <h1>DATOS PADRINOS Y ADOPTANTES</h1>
            </div>

        <table class="table table-striped table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Empleo</th>
                    <th>No. Documento</th>
                    <th>Dirección</th>
                    <th>Ingresos</th>
                    <th>Mascota</th>
                    <th>Rol</th>
                    <th>Documento</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'appmascotas';

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die('Error de conexión: ' . $conn->connect_error);
                }

                // Consulta para obtener datos de padrinos
                $sql_padrinos = "SELECT registro.nombres, registro.apellidos, padrinos.telefono, registro.correo, 
                                 padrinos.tipo_cedula, padrinos.cedula, mascotas.nombre AS mascota 
                                 FROM registro 
                                 INNER JOIN padrinos ON registro.correo = padrinos.correo 
                                 LEFT JOIN mascotas ON padrinos.idmascota = mascotas.id"; 
                $result_padrinos = $conn->query($sql_padrinos);
                $null = 'No presenta dato';
                if ($result_padrinos->num_rows > 0) {
                    while ($row_padrino = $result_padrinos->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td style="color: white">' . $row_padrino['nombres'] . '</td>';
                        echo '<td style="color: white">' . $row_padrino['apellidos'] . '</td>';
                        echo '<td style="color: white">' . $row_padrino['telefono'] . '</td>';
                        echo '<td style="color: white">' . $row_padrino['correo'] . '</td>';
                        echo '<td style="color: white">' . $null . '</td>';
                        echo '<td style="color: white">' . $row_padrino['tipo_cedula'] . ' ' . $row_padrino['cedula'] . '</td>';
                        echo '<td style="color: white">' . $null . '</td>';
                        echo '<td style="color: white">' . $null . '</td>';
                        echo '<td style="color: white">' . $row_padrino['mascota'] . '</td>';
                        echo '<td style="color: white">Padrino</td>';
                        echo '<td style="color: white"> </td>';
                        echo '</tr>';
                    }
                }

                // Consulta para obtener datos de adoptantes
                $sql_adoptantes = "SELECT registro.nombres, registro.apellidos, adopciones.telefono, adopciones.correo, 
                                   adopciones.empleo, adopciones.cedula_tipo, adopciones.cedula, adopciones.direccion, 
                                   adopciones.ingresos_mensuales, mascotas.nombre AS mascota , adopciones.escaneo_cedula
                                   FROM registro 
                                   INNER JOIN adopciones ON registro.correo = adopciones.correo 
                                   LEFT JOIN mascotas ON adopciones.idmascota = mascotas.id"; 
                $result_adoptantes = $conn->query($sql_adoptantes);

                if ($result_adoptantes->num_rows > 0) {
                    while ($row_adoptante = $result_adoptantes->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td style="color: white">' . $row_adoptante['nombres'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['apellidos'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['telefono'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['correo'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['empleo'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['cedula_tipo'] . ' ' . $row_adoptante['cedula'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['direccion'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['ingresos_mensuales'] . '</td>';
                        echo '<td style="color: white">' . $row_adoptante['mascota'] . '</td>';
                        echo '<td style="color: white">Adoptante</td>';
                        echo '<td><button class="btn btn-secondary" onclick="abrirVentana(\'' . $row_adoptante['escaneo_cedula'] . '\')">Ver Documento</button></td>';
                        echo '</tr>';
                    }
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>


    <script>
    function abrirVentana(rutaDocumento) {
        window.open(rutaDocumento, '_blank', 'width=600,height=400');
    }
    </script>
</body>
</html>
