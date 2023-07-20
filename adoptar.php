<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROCESO ADOPTAR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<header>
    <style>
        body{
            background-color:#064276;
        }
    </style>

    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <div href="#" class="navbar-brand d-flex align-items-center">
                <img src="img/logo.png" width="50" height="50" alt="">
                <strong>Angeles de cuatro patas</strong>
            </div>
            <a href="MenuUsuarios.html">
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
    <main>
    <div class="col-md-7 col-lg-8">
                <h4 class="mb-3"></h4>
                <?php
                    $idmascota = $_GET['id'] ?? '';
                    $correo = $_GET['llave'] ?? '';
                ?>
                <form class="needs-validation" action="registrosolicitudadopcion.php?id=<?php echo $idmascota ?>&llave=<?php echo $correo ?>" method="POST" novalidate enctype="multipart/form-data">
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Solicitud de adopción</h4>
            <form id="adoptionForm" class="needs-validation" novalidate action="registrosolicitudadopcion.php" method="POST">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Empleo" class="form-label">Empleo:</label>
                        <input type="text" class="form-control" id="Empleo" name="Empleo" placeholder="" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa un empleo válido.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="Dirección" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="Dirección" name="Dirección" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa una dirección válida.
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Teléfono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="Teléfono" name="Teléfono" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa un número de teléfono válido.
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="country" class="form-label">Tipo de Documento:</label>
                        <select class="form-select" id="country" name="country" required>
                            <option value="">Seleccionar...</option>
                            <option>Cédula extranjera</option>
                            <option>Tarjeta de identidad</option>
                            <option>Cédula ciudadania</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona una opción válida.
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="archivo_cedula" class="form-label">Escaneo de la cédula:</label>
                        <input type="file" class="form-control" id="archivo_cedula" name="archivo_cedula" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa un archivo válido.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="cedula" class="form-label">Numero de cedula:</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa un número válido para la cédula.
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="Ingresos" class="form-label">Ingresos mensuales:</label>
                    <input type="text" class="form-control" id="Ingresos" name="Ingresos" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un monto válido para los ingresos mensuales.
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">
                            Acepto los términos y condiciones
                            <span>
                                <a href="TyC.pdf" target="_blank">Ver términos y condiciones</a>
                            </span>
                        </label>
                        <div class="invalid-feedback">
                            Debes aceptar los términos y condiciones para continuar.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Solicitar adopción</button>
                </div>
            </form>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-v5i5A+2Ufta5EVb6iKt7rO4E6n7Yo/uRY2DmEIfw7s/xwnMfa6Ftz/v81Ry3EfDo" crossorigin="anonymous"></script>
</body>
</html>
