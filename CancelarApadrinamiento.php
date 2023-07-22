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
    <h2 class="titulo">
        CANCELAR APADRINAMIENTO
    </h2>
    <!––Aqui irá la tabla con los apadrinamientos por cancelar––>
    <div class="button-container">
        <span class="descripcion">Manchas</span>
        <button class="cancelar-button">Cancelar apadrinamiento</button>
    </div>
    <div class="button-container">
        <span class="descripcion">Kaiser</span>
        <button class="cancelar-button">Cancelar apadrinamiento</button>
    </div>
    <div class="button-container">
        <span class="descripcion">Max</span>
        <button class="cancelar-button">Cancelar apadrinamiento</button>
    </div>
</body>
</html>
