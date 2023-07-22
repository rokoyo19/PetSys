<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agende su cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
        }
        h2 {
            color: #FFFFFF; /* Color blanco */
            text-align: center; /* Centrado horizontal */
        }
        .date {
            color: #FFFFFF; /* Color blanco */
            text-align: left; /* Alineado a la izquierda */
            margin-top: 10px; /* Espacio superior */
            margin-bottom: 10px; /* Espacio inferior */
            margin-left: 20px; /* Margen izquierdo */
        }
        .button-container {
            margin-top: 10px; /* Espacio superior */
            display: flex;
            align-items: center; /* Centrado vertical */
            margin-left: 20px; /* Margen izquierdo */
        }
        .accept-button {
            background-color: #00FF00; /* Color verde */
            color: #000000; /* Color negro */
            padding: 10px 20px; /* Espaciado interno */
            margin-right: 10px; /* Espacio derecho */
            margin-left: 10px; /* espacio izquierdo*/
        }
        .reject-button {
            background-color: #FF0000; /* Color rojo */
            color: #FFFFFF; /* Color blanco */
            padding: 10px 20px; /* Espaciado interno */
        }
        .alert{
            color: #FFFFFF; /* Color blanco */
            text-align: center; /* Centrado horizontal */
        }
        .white_text{
            color: #FFFFFF; /* Color blanco */
            margin-left: 40px; /* espacio izquierdo*/
        }
        .Subtitle{
            color: #3DB3F5; /* Color blanco */
            margin-left: 20px; /* espacio izquierdo*/
        }
        .texto-blanco {
            color: #FFFFFF;
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
                    // Obtener el valor del atributo "llave" del URL y decodificarlo
                    $llave = urldecode($_GET['llave']) ?? '';
                ?>
                <a href="MenuUsuarios.php?llave=<?php echo urlencode($llave); ?>">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <h2>CONFIRME SU CITA</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="texto-blanco">Fecha de Cita</th>
                <th class="texto-blanco">Aceptar Cita</th>
                <th class="texto-blanco">Rechazar Cita</th>
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

            // Procesar el formulario para aceptar, rechazar o cancelar citas
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $idmascota = $_POST['idmascota'];
                $correo = $_POST['correo'];
                $estado = $_POST['estado'];

                // Actualizar la fecha_cita a NULL si el estado es "rechazada"
                if ($estado === "rechazada") {
                    $sql_update = "UPDATE adopciones SET fecha_cita = NULL, estado = 'sin aceptar' WHERE idmascota = $idmascota AND correo = '$correo'";
                    if ($conn->query($sql_update) === TRUE) {
                        echo '<div class="alert alert-success text-black" role="alert">Cita rechazada exitosamente.</div>';

                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error al rechazar la cita: ' . $conn->error . '</div>';
                    }
                } elseif ($estado === "aceptada") {
                    // El código para aceptar la cita permanece igual
                    // ...
                } elseif ($estado === "cancelada") {
                    // El código para cancelar la cita permanece igual
                    // ...
                }
            }

            // Consulta SQL para obtener las citas por aceptar o rechazar
            $sql = "SELECT * FROM adopciones WHERE correo = '$llave' AND fecha_cita IS NOT NULL AND estado = 'sin aceptar' ORDER BY fecha_cita ASC";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si hay datos para mostrar
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="text-white">' . $row['fecha_cita'] . '</td>';
                    echo '<td>';
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '?llave=' . urlencode($llave) . '" method="post">';
                    echo '<input type="hidden" name="idmascota" value="' . $row['idmascota'] . '">';
                    echo '<input type="hidden" name="correo" value="' . $llave . '">';
                    echo '<input type="hidden" name="estado" value="aceptada">';
                    echo '<button type="submit" class="accept-button">Aceptar cita</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td>';
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '?llave=' . urlencode($llave) . '" method="post">';
                    echo '<input type="hidden" name="idmascota" value="' . $row['idmascota'] . '">';
                    echo '<input type="hidden" name="correo" value="' . $llave . '">';
                    echo '<input type="hidden" name="estado" value="rechazada">';
                    echo '<button type="submit" class="reject-button">Rechazar cita</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3" class="texto-blanco">No hay citas por confirmar.</td></tr>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Texto y lista de citas aceptadas -->
    <div class="Subtitle">
        Citas aceptadas:
    </div>
    <div id="citas-aceptadas" class="white_text">
        <?php
        // Realizar la conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die('Error de conexión: ' . $conn->connect_error);
        }

        // Consulta SQL para obtener las citas aceptadas
        $sql_aceptadas = "SELECT * FROM adopciones WHERE correo = '$llave' AND fecha_cita IS NOT NULL AND estado = 'aceptada' ORDER BY fecha_cita ASC";
        $result_aceptadas = $conn->query($sql_aceptadas);

        if ($result_aceptadas->num_rows > 0) {
            echo 'Cita programada para el ';
            while ($row_aceptada = $result_aceptadas->fetch_assoc()) {
                echo $row_aceptada['fecha_cita'] . ', ';
            }
        } else {
            echo 'No hay citas aceptadas.';
        }

        $conn->close();
        ?>
    </div>

    <script>
        // Agregar evento de clic al botón "Aceptar cita" y "Rechazar cita"
        const acceptButtons = document.querySelectorAll('.accept-button');
        acceptButtons.forEach(button => {
            button.addEventListener('click', () => {
                const form = button.parentElement;
                form.submit();
            });
        });

        const rejectButtons = document.querySelectorAll('.reject-button');
        rejectButtons.forEach(button => {
            button.addEventListener('click', () => {
                const form = button.parentElement;
                form.submit();
            });
        });
    </script>
</body>
</html>
