<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu padrinos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
            color: white;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .navbar-brand strong {
            font-size: 1.25rem;
        }

        .menu-container {
            max-width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
        }

        .menu-link {
            display: block;
            margin-bottom: 10px;
            padding: 10px 20px;
            text-align: center;
            background-color: #009e0f;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .menu-link:hover {
            background-color: #00850e;
        }

        .d-flex.justify-content-center {
            display: flex;
            justify-content: center;
            margin-top: 10px; /* Espacio entre los botones */
        }

        .btn-primary {
            background-color: #009e0f;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%; /* Botones del mismo ancho */
        }

        .btn-primary:hover {
            background-color: #00850e;
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
    <div class="menu-container">
        <?php
            // Obtener el valor del atributo "llave" del URL y decodificarlo
            $llave = urldecode($_GET['llave']) ?? '';
            
            // Generar el enlace a "Cancelar Apadrinamientos" con el valor de "llave" en el URL
            $enlaceCancelarAdopcion = "CancelarAdopcion.php?llave=$llave";
            $enlaceCitaAdoptante = "citaAdoptante.php?llave=$llave";
        ?>
        <div class="d-flex justify-content-center">
            <a href="<?php echo $enlaceCancelarAdopcion; ?>" class="btn btn-primary btn-lg">Cancelar Adopción</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="<?php echo $enlaceCitaAdoptante; ?>" class="btn btn-primary btn-lg">Ver Citas</a>
        </div>
    </div>
</body>
</html>
