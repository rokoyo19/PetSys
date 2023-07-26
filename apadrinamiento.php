<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apadrinar</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    
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
                    <strong>Ángeles de cuatro patas</strong>
                </div>
                
                <div class="button-group">
                <?php
    // Obtener el valor del atributo "llave" del URL y decodificarlo
    $llave = urldecode($_GET['llave']) ?? '';?>
            <a href="MenuUsuarios.php?llave=<?php echo urlencode($llave); ?>">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
      
    <div class="container">
        <main>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3"></h4>
                <?php
                    $idmascota = $_GET['id'] ?? '';
                    $correo = $_GET['llave'] ?? '';
                ?>
                <form class="needs-validation" action="registropadrino.php?id=<?php echo $idmascota ?>&llave=<?php echo $correo ?>" method="POST" novalidate>
                    

                        <div class="col-sm-6">
                            <label for="Telefono" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                El teléfono es requerido.
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3"></h4>

                    
                        <div class="col-md-5">
                            <label for="TipoCedula" class="form-label">Tipo de cédula:</label>
                            <select class="form-select" id="TipoCedula" name="TipoCedula" required>
                                <option value="">Seleccione...</option>
                                <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                                <option value="Cédula extranjera">Cédula extranjera</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            </select>
                            <div class="invalid-feedback">
                                Seleccione un tipo de cédula válido.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Cedula" class="form-label">Cédula:</label>
                            <input type="text" class="form-control" id="Cedula" name="Cedula" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                La cédula es requerida.
                            </div>
                        </div>
                    

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="acceptTerms" name="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">Acepto los términos y condiciones</label>
                            <div class="invalid-feedback">
                                Debes aceptar los términos y condiciones.
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="TERMINOS.html" class="button">Ver términos y condiciones</a>
                 
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-v5i5A+2Ufta5EVb6iKt7rO4E6n7Yo/uRY2DmEIfw7s/xwnMfa6Ftz/v81Ry3EfDo" crossorigin="anonymous"></script>
</body>
</html>
