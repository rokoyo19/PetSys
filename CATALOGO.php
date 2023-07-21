<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGO</title>

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
                <a href="MenuUsuarios.php">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                    </svg>
                </button>  
                </a>
            </div>
        </div>
    </header>
    </header>
      <style>
        #filter-container {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            margin-right: 1050px;
            color: white;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            display: none;
        }
        
        .radio-input {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .radio-input input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<button class="boton" onclick="toggleFilters()">Mostrar Filtros</button>

<div id="filter-container">
    <h2>Edad:</h2>
    <label class="radio-input">
        <input type="radio" name="edad" value="1mes-6mes">
        1 mes a 6 meses
    </label>
    <label class="radio-input">
      <input type="radio" name="edad" value="6mes-1año">
      6 meses a 1 año
  </label>
  <label class="radio-input">
    <input type="radio" name="edad" value="1año-2año">
    1 año a 2 años
</label>
<label class="radio-input">
  <input type="radio" name="edad" value="2año-3año">
  2 años a 3 años
</label>
<label class="radio-input">
  <input type="radio" name="edad" value="3año-delante">
  3 años en adelante
</label>
    
    <h2>Especie:</h2>
    <label class="radio-input">
        <input type="radio" name="especie" value="Gato">
        Gato
    </label>
    <label class="radio-input">
      <input type="radio" name="especie" value="Perro">
      Perro
  </label>
  <label class="radio-input">
    <input type="radio" name="especie" value="Otro">
    Otro
</label>
    
    <h2>Tamaño:</h2>
    <label class="radio-input">
        <input type="radio" name="tamano" value="pequeño">
        Pequeño
    </label>
    <label class="radio-input">
      <input type="radio" name="tamano" value="mediano">
      Mediano
  </label><label class="radio-input">
    <input type="radio" name="tamano" value="grande">
    Grande
</label>
    <style>
      .boton {
        background-color: white;
        color: black;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        font-weight: bold;
      }
    </style>
    <button class="boton" onclick="applyFilters()">Aplicar Filtro</button>
</div>

<script>
    function toggleFilters() {
        var filterContainer = document.getElementById('filter-container');
        if (filterContainer.style.display === 'none') {
            filterContainer.style.display = 'block';
        } else {
            filterContainer.style.display = 'none';
        }
    }
    
    function applyFilters() {
        var edad = document.querySelector('input[name="edad"]:checked').value;
        var especie = document.querySelector('input[name="especie"]:checked').value;
        var tamano = document.querySelector('input[name="tamano"]:checked').value;
        
        // Aquí puedes realizar la lógica para aplicar los filtros a tu catálogo
        // Puedes acceder a las variables "edad", "especie" y "tamano" y realizar las acciones correspondientes
        
        console.log('Filtros aplicados:');
        console.log('Edad:', edad);
        console.log('Especie:', especie);
        console.log('Tamaño:', tamano);
    }
</script>
    <main>
      <div class="container">    
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          
           
                </div>
              </div>
            </div>
          
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    <?php
    // Obtener el valor del atributo "llave" del URL y decodificarlo
    $llave = urldecode($_GET['llave']) ?? '';
$username = "root";
$password = "";
$database = "appmascotas";
$mysqli = new mysqli("localhost", $username, $password, $database);

// Consultar la base de datos para obtener las mascotas con estado 'publicado'
$query = "SELECT id, nombre, fotodelamascota FROM mascotas WHERE estado = 'publicado'";
$result = $mysqli->query($query);

// Verificar si se encontraron mascotas
if ($result && $result->num_rows > 0) {
    echo "<div style='margin: 0px 50px 50px 150px;;'>"; // Disminuimos el margen superior exterior a 20px
    while ($mascota = $result->fetch_assoc()) {
        $id = $mascota['id'];
        $nombre = $mascota['nombre'];
        $fotodelamascota = $mascota['fotodelamascota'];

        // Mostrar la foto de la mascota, el mensaje y el botón dentro de un cuadro blanco con estilos CSS
        echo "<div style='background-color: white; padding: 20px; margin-bottom: 20px; display: inline-block; text-align: center; margin-right: 10px;'>";
        echo "<img src='$fotodelamascota' alt='Foto de la mascota' style='width: 300px; height: 300px; object-fit: cover;'><br>";
        echo "<p style='margin-top: 10px;'>Hola, mi nombre es $nombre. ¡Adóptame!</p>";
        echo "<a href='DetallesMascota.php?id=$id&llave=$llave'><button type='button' class='btn btn-sm btn-outline-secondary'>Ver detalles</button></a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // No se encontraron mascotas publicadas
    echo "<p>No hay mascotas disponibles para adopción en este momento.</p>";
}
?>




</body>
</html>
