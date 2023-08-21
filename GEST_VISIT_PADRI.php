<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTION_VISITA_PADRINO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #064276;
            color: white;
        }
        
        .navbar {
            background-color: #000000;
        }
        
        .titulo {
            text-align: center;
            font-weight: bold;
            padding-top: 30px;
        }
        
        .boton-aceptar {
            background-color: green;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .boton-aceptar:hover {
            background-color: #4CAF50;
        }
        
        .boton-rechazar {
            background-color: red;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .boton-rechazar:hover {
            background-color: #af060f;
        }
        
        .table {
            color: white;
            background-color: #1f2d3d;
        }
        
        .table-dark thead th {
            color: white;
            background-color: #343a40;
        }
        
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Ángeles de cuatro patas</strong>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <h1 class="titulo">Gestion visita padrino</h1>
        <hr>
        <h2>Visitas Pendientes</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Padrino</th>
                    <th>Mascota</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Aceptar</th>
                    <th>Rechazar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "appmascotas";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["aceptar_visita"])) {
                    $partes = explode("_", $_POST["aceptar_visita"]);
                    $correo = $partes[0];
                    $idMascota = $partes[1];

                    // Actualizar el estado de la visita a "aceptada"
                    $sqlActualizar = "UPDATE visita_padrino SET estado = 'aceptada' WHERE correo = '$correo' AND idmascota = '$idMascota'";

                    if ($conn->query($sqlActualizar) === TRUE) {
                        // Redirigir a la misma página para refrescar los datos
                        header("Location: GEST_VISIT_PADRI.php");
                        exit();
                    } else {
                        echo "Error al aceptar la visita: " . $conn->error;
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rechazar_visita"])) {
                    $partes = explode("_", $_POST["rechazar_visita"]);
                    $correo = $partes[0];
                    $idMascota = $partes[1];

                    // Eliminar la visita de la tabla visita_padrino
                    $sqlEliminar = "DELETE FROM visita_padrino WHERE correo = '$correo' AND idmascota = '$idMascota'";

                    if ($conn->query($sqlEliminar) === TRUE) {
                        // Redirigir a la misma página para refrescar los datos
                        header("Location: GEST_VISIT_PADRI.php");
                        exit();
                    } else {
                        echo "Error al rechazar la visita: " . $conn->error;
                    }
                }

                // Consulta SQL para obtener los datos de las visitas pendientes
                $sql = "SELECT rp.nombres AS padrino, m.nombre AS mascota, vp.fecha, vp.hora, vp.correo, vp.idmascota
                        FROM visita_padrino vp
                        INNER JOIN registro rp ON vp.correo = rp.correo
                        INNER JOIN mascotas m ON vp.idmascota = m.id
                        WHERE vp.estado = 'sin aceptar'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='color: white'>" . $row["padrino"] . "</td>";
                        echo "<td style='color: white'>" . $row["mascota"] . "</td>";
                        echo "<td style='color: white'>" . $row["fecha"] . "</td>";
                        echo "<td style='color: white'>" . $row["hora"] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<button type='submit' class='boton-aceptar' name='aceptar_visita' value='{$row['correo']}_{$row['idmascota']}'>Aceptar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<button type='submit' class='boton-rechazar' name='rechazar_visita' value='{$row['correo']}_{$row['idmascota']}'>Rechazar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='color: white;'>No hay visitas de padrinos pendientes.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <hr>

        <h2>Citas Aceptadas</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Padrino</th>
                    <th>Mascota</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos (ya está abierta)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "appmascotas";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }
                // Consulta SQL para obtener las visitas aceptadas
                $sqlAceptadas = "SELECT rp.nombres AS padrino, m.nombre AS mascota, vp.fecha, vp.hora
                                FROM visita_padrino vp
                                INNER JOIN registro rp ON vp.correo = rp.correo
                                INNER JOIN mascotas m ON vp.idmascota = m.id
                                WHERE vp.estado = 'aceptada'";

                $resultAceptadas = $conn->query($sqlAceptadas);

                if ($resultAceptadas->num_rows > 0) {
                    while ($row = $resultAceptadas->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='color: white'>" . $row["padrino"] . "</td>";
                        echo "<td style='color: white'>" . $row["mascota"] . "</td>";
                        echo "<td style='color: white'>" . $row["fecha"] . "</td>";
                        echo "<td style='color: white'>" . $row["hora"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' style='color: white;'>No hay visitas aceptadas.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
