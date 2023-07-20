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
    <div class="d-flex justify-content-center">
        <?php
            // Obtener el valor del atributo "llave" del URL y decodificarlo
            $llave = urldecode($_GET['llave']) ?? '';
            
            // Generar el enlace a "CATALOGO.php" con el valor de "llave" en el URL
            $enlaceCatalogo = "CATALOGO.php?llave=$llave"
        ?>
        <a href="<?php echo $enlaceCatalogo; ?>" class="btn btn-primary btn-lg">Catálogo</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="CancelarAdopcion.html" class="btn btn-primary btn-lg">Cancelar Adopciones</a>
    </div>
    <div class="d-flex justify-content-center">
        <a href="CancelarApadrinamiento.html" class="btn btn-primary btn-lg">Cancelar Apadrinamientos</a>
    </div>
</body>
</html>
