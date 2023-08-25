<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISITA_PADRINO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
    <style>
        body {
            background-color: #064276;
            color: #FFFFFF;
        }
        .col-md-6{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Ángeles de cuatro patas</strong>
                </div>
                <?php
                    $llave = urldecode($_GET['llave']) ?? '';
                ?>
                <a href="MenuPadrinos.php?llave=<?php echo urlencode($llave); ?>">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                        </svg>
                    </button>  
                </a>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="titulo">Agendar visita</h1>
                <form method="post" action="guardar_visita.php?llave=<?php echo $llave?>">
                    <table class="tabla">
                        <tr>
                            <td class="texto">
                                <label for="mascota">Seleccione la mascota:</label>
                                <select name="mascota" id="mascota" class="form-select">
                                    <?php
                                    $servername = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $dbname = 'appmascotas';

                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die('Error de conexión: ' . $conn->connect_error);
                                    }

                                    $correoUsuario = $llave;

                                    $sql_mascotas = "SELECT mascotas.id, mascotas.nombre 
                                                    FROM mascotas 
                                                    INNER JOIN padrinos ON mascotas.id = padrinos.idmascota 
                                                    WHERE padrinos.correo = '$correoUsuario'";

                                    $result_mascotas = $conn->query($sql_mascotas);

                                    if ($result_mascotas->num_rows > 0) {
                                        while ($row_mascota = $result_mascotas->fetch_assoc()) {
                                            echo '<option value="' . $row_mascota['id'] . '">' . $row_mascota['nombre'] . '</option>';
                                        }
                                    }

                                    $conn->close();
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table class="tabla">
                        <tr>
                            <td class="texto">Fecha:</td>
                            <td><input type="date" name="fecha" class="form-control"></td>
                        </tr>
                    </table>
                    <table class="tabla">
                        <tr>
                            <td class="texto">Hora:</td>
                            <td><input type="time" name="hora" class="form-control"></td>
                            <td><button type="submit" class="boton-agendar_visita btn btn-success">Agendar visita</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-6">
                <h1>Visitas agendadas</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre Mascota</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
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

                        $correoUsuario = $llave;

                        $sql_visitas = "SELECT mascotas.nombre AS nombre_mascota, visita_padrino.fecha, visita_padrino.hora, visita_padrino.estado 
                                        FROM visita_padrino 
                                        INNER JOIN mascotas ON visita_padrino.idmascota = mascotas.id 
                                        WHERE visita_padrino.correo = '$correoUsuario'";

                        $result_visitas = $conn->query($sql_visitas);

                        if ($result_visitas->num_rows > 0) {
                            while ($row_visita = $result_visitas->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td style="color: white">' . $row_visita['nombre_mascota'] . '</td>';
                                echo '<td style="color: white">' . $row_visita['fecha'] . '</td>';
                                echo '<td style="color: white">' . $row_visita['hora'] . '</td>';
                                echo '<td style="color: white">' . $row_visita['estado'] . '</td>';
                                echo '</tr>';
                            }
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
