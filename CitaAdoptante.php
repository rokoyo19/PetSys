<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agende su cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{background-color:#064276;}h2{color:#FFFFFF;text-align:center;}.text-white{color:#FFFFFF;}
        .date{color:#FFFFFF;text-align:left;margin-top:10px;margin-bottom:10px;margin-left:20px;}
        .button-container{margin-top:10px;display:flex;align-items:center;margin-left:20px;}
        .accept-button{background-color:#00FF00;color:#000000;padding:10px 20px;margin-right:10px;margin-left:10px;}
        .reject-button{background-color:#FF0000;color:#FFFFFF;padding:10px 20px;}
        .agendar-button{background-color:#FFFFFF;color:#000000;padding:10px 20px;}
        .alert{color:#FFFFFF;text-align:center;}
        .white_text{color:#FFFFFF;margin-left:40px;}
        .Subtitle{color:#3DB3F5;margin-left:20px;}
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
                <th class="text-white">Fecha de Cita</th>
                <th class="text-white">Aceptar Cita</th>
                <th class="text-white">Rechazar Cita</th>
                <th class="text-white">Solicitar Fecha Cita</th>
                <th class="text-white">Agendar</th>
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
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $idmascota = $_POST['idmascota'];
                    $correo = $_POST['correo'];
                    $estado = $_POST['estado'];
                    $nueva_fecha = $_POST['nueva_fecha'];
                    if ($estado === "rechazada") {
                        $sql_update = "UPDATE adopciones SET fecha_cita = NULL, estado = 'sin aceptar' WHERE idmascota = $idmascota AND correo = '$correo'";
                        if ($conn->query($sql_update) === TRUE) {
                            echo '<div class="alert alert-success text-black" role="alert">Cita rechazada exitosamente.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error al rechazar la cita: ' . $conn->error . '</div>';
                        }
                    } elseif ($estado === "aceptada") {
                        $sql_update = "UPDATE adopciones SET estado = 'aceptada' WHERE idmascota = $idmascota AND correo = '$correo'";
                        if ($conn->query($sql_update) === TRUE) {
                            echo '<div class="alert alert-success text-black" role="alert">Cita aceptada exitosamente.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error al aceptar la cita: ' . $conn->error . '</div>';
                        }
                    } elseif ($estado=== "reagendar"){
                        $nueva_fecha_formatted = date('Y-m-d', strtotime($nueva_fecha));
                        $sql_update = "UPDATE adopciones SET fecha_cita = '$nueva_fecha_formatted', estado = 'reagendar' WHERE idmascota = $idmascota AND correo = '$correo'";
                        if ($conn->query($sql_update) === TRUE) {
                            echo '<div class="alert alert-success text-black" role="alert">Cita reagendada exitosamente.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Error al reagendar la cita: ' . $conn->error . '</div>';
                        }
                    }
                }
                $sql = "SELECT * FROM adopciones WHERE correo = '$llave' AND fecha_cita IS NOT NULL AND estado = 'sin aceptar' ORDER BY fecha_cita ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
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
                        echo '<td>';
                        echo '<form action="' . $_SERVER['PHP_SELF'] . '?llave=' . urlencode($llave) . '" method="post">';
                        echo '<input type="hidden" name="idmascota" value="' . $row['idmascota'] . '">';
                        echo '<input type="hidden" name="correo" value="' . $llave . '">';
                        echo '<input type="hidden" name="estado" value="reagendar"> <!-- Cambiado a "reagendar" -->';
                        echo '<input type="date" name="nueva_fecha" required>';
                        echo '<button type="submit" class="agendar-button">Reagendar</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3" class="text-white">No hay citas por confirmar.</td></tr>';
                }
                $conn->close();
            ?>
        </tbody>
    </table>
    <div class="Subtitle">Citas aceptadas:</div>
    <div id="citas-aceptadas" class="white_text">
        <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die('Error de conexión: ' . $conn->connect_error);
            }
            $sql_aceptadas = "SELECT * FROM adopciones WHERE correo = '$llave' AND fecha_cita IS NOT NULL AND estado != 'sin aceptar' ORDER BY fecha_cita ASC";
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
        const agendarButtons = document.querySelectorAll('.agendar-button');
        agendarButtons.forEach(button => {
            button.addEventListener('click', () => {
                const form = button.parentElement;
                form.submit();
            });
        });
    </script>
</body>
</html>
