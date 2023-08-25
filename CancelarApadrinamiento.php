<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar Apadrinamiento</title>
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
        /* Agregamos estilos para el texto en blanco */
        .texto-blanco {
            color: #FFFFFF; /* Color blanco */
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
    <h2 class="titulo">
        CANCELAR APADRINAMIENTO
    </h2>
    <!-- Tabla con los apadrinamientos por cancelar -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th class="texto-blanco">Nombre de la mascota</th>
                <th class="texto-blanco">Especie</th>
                <th class="texto-blanco">Raza</th>
                <th class="texto-blanco">Cancelar apadrinamiento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Realizar la conexión a la base de datos (ajustar los datos de conexión según tu caso)
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

            // Procesar la solicitud POST para cancelar el apadrinamiento
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_padrino'])) {
                $id_padrino = $_POST['id_padrino'];

                // Eliminar el padrino de la base de datos
                $sql_delete = "DELETE FROM padrinos WHERE id = '$id_padrino'";
                if ($conn->query($sql_delete) === TRUE) {
                    echo '<div class="alert alert-success" role="alert">Apadrinamiento cancelado exitosamente.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error al cancelar el apadrinamiento.</div>';
                }
            }

            // Consulta SQL para obtener los datos de la tabla de padrinos con información de las mascotas
            $sql = "SELECT p.id AS id_padrino, m.nombre AS nombre_mascota, m.especie, m.raza 
                    FROM padrinos p
                    INNER JOIN mascotas m ON p.idmascota = m.id";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Verificar si hay datos para mostrar
            if ($result->num_rows > 0) {
                // Recorrer los resultados y mostrarlos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td class="text-white">' . $row['nombre_mascota'] . '</td>';
                    echo '<td class="text-white">' . $row['especie'] . '</td>';
                    echo '<td class="text-white">' . $row['raza'] . '</td>';
                    echo '<td>';
                    echo '<form action="' . $_SERVER['PHP_SELF'] . '?llave=' . $llave . '" method="post">';
                    echo '<input type="hidden" name="id_padrino" value="' . $row['id_padrino'] . '">';
                    echo '<button type="submit" class="cancelar-button">Cancelar apadrinamiento</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4" class="texto-blanco">No hay datos disponibles.</td></tr>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
