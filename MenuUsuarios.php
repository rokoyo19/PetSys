<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #064276;
            color: white;
        }

        .logo {
            max-width: 100px;
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

        .corner-image {
            position: fixed;
            top: 10px;
            right: 10px;
            width: 100px;
            cursor: pointer;
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
            </div>
        </div>
    </header>  
    <div class="menu-container">
        <?php
            // Obtener el valor del atributo "llave" del URL y decodificarlo
            $llave = urldecode($_GET['llave']) ?? '';
            
            // Generar el enlace a "CATALOGO.php" con el valor de "llave" en el URL
            $enlaceCatalogo = "CATALOGO.php?llave=$llave";
            $enlaceCancelarAdopcion = "MenuAdoptante.php?llave=$llave";
            $enlaceMenuPadrinos = "MenuPadrinos.php?llave=$llave";  // Nuevo enlace agregado
        ?>
        <a href="<?php echo $enlaceCatalogo; ?>" class="menu-link">Catálogo</a>
        <a href="<?php echo $enlaceCancelarAdopcion; ?>" class="menu-link">Menú Adopciones</a>
        <a href="<?php echo $enlaceMenuPadrinos; ?>" class="menu-link">Menú Padrinos</a>
        <a href="login.html" class="menu-link">Cerrar Sesión</a>
    </div>
</body>
</html>
