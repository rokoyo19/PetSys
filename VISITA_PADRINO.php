<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISITA_PADRINO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
    
    <style>
        body {
            background-color:#064276;
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
    </header>
<body>
    <style>
        .titulo{
        text-align: center;
        color: white;
        font-weight: bold;
        padding-top: 30px;
        }
    </style>
       <style>
        .texto{
            color: white;
            font-size: 20px;
            font-weight: bolder;
        }
      </style>
    <style>
                .tabla{
                    margin-top: 10px;
                margin-left: 50px;
                border-collapse: separate;
                border-spacing: 60px; 
                }
    </style>
          <style>
            .boton-agendar_visita {
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
            .boton-agendar_visita:hover {
              background-color: #4CAF50; /* Color verde más oscuro al pasar el cursor */
            }
          </style>
    <h1 class="titulo">Agendar visita</h1>
    <table class="tabla">
        <tr>
            <td class="texto"><label for="mascota">Seleccione la mascota:   </label><select id="mascota">
                <option value="STIVEN">STIVEN</option>
                <option value="MARLON">MARLON</option>
                <option value="DUVAN">DUVAN</option>
                <option value="DUBAN">DUBAN</option>
            </select></td>
        </tr>
    </table>
    <table class="tabla">
        <tr>
            <td class="texto">Fecha:</td>
            <td><input type="date"></td>
            
        </tr>
    </table>
<table class="tabla">
    <tr>
        <td class="texto">Hora:</td>
        <td><input type="time"></td>
        <td><button class="boton-agendar_visita">Agendar visita</button></td>
    </tr>
</table>

</body>
</html>