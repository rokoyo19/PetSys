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

<div class="container mt-4">
    <h3 class="white-text">Datos padrinos y adoptantes</h3>
    
    <table class="table table-striped table-bordered mt-3">
        <thead>
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
                <th></th> <!-- Columna para el botón -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>123-456-7890</td>
                <td>john@example.com</td>
                <td>Engineer</td>
                <td>12345</td>
                <td>123 Main St</td>
                <td>$50000</td>
                <td>Dog</td>
                <td>Adoptante</td>
                <td><button class="btn btn-secondary">Ver Documento</button></td>
            </tr>
            <tr>
                <td>Jane</td>
                <td>Smith</td>
                <td>987-654-3210</td>
                <td>jane@example.com</td>
                <td>Teacher</td>
                <td>54321</td>
                <td>456 Elm St</td>
                <td>$40000</td>
                <td>Cat</td>
                <td>Padrino</td>
                <td><button class="btn btn-secondary">Ver Documento</button></td>
            </tr>
            <!-- Agrega más filas con datos aleatorios aquí -->
        </tbody>
    </table>
</div>

</body>
</html>
