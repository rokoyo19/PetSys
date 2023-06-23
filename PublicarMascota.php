<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encabezado y estilos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUBLICAR DATOS MASCOTAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <div class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" width="50" height="50" alt="">
                    <strong>Angeles de cuatro patas</strong>
                </div>
                <div class="button-group">
                    <a href="MenuTrabajadores.html">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                    </a>
                    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
                </div>
            </div>
            <main>
                
                </div>

    <div id="mascotas-list">
    <head>
    <title>Tabla de Mascotas</title>
    <style>
        

        table {
            width: 100%;
            text-align: center;
        }

        
    </style>
</head>
<body>
    </div>
            <?php 
$username = "root"; 
$password = ""; 
$database = "appmascotas"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT id,nombre,raza,edad,estado FROM mascotas";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
        <td> <font face="Arial" color="#ffffff">Id</font> </td> 
        <td> <font face="Arial" color="#ffffff">Nombre</font> </td> 
        <td> <font face="Arial" color="#ffffff">Raza</font> </td> 
        <td> <font face="Arial" color="#ffffff">Edad</font> </td> 
        <td> <font face="Arial" color="#ffffff">estado</font> </td> 

      </tr>';
$mascotas = array();
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $mascota = array(
            "id" => $row["id"],
            "nombre" => $row["nombre"],
            "raza" => $row["raza"],
            "edad" => $row["edad"],
            "estado" => $row["estado"]
        );$mascotas[] = $mascota;

        $field1name = $row["id"];
        $field2name = $row["nombre"];
        $field3name = $row["raza"];
        $field4name = $row["edad"];
        $field5name = $row["estado"];
        

        echo '<tr> 
            <td><font color="#ffffff">'.$field1name.'</font></td> 
            <td><font color="#ffffff">'.$field2name.'</font></td> 
            <td><font color="#ffffff">'.$field3name.'</font></td>
            <td><font color="#ffffff">'.$field4name.' años</font></td>
            <td><font color="#ffffff">'.$field5name.'</font></td>
            
            <td><button><a href="DetallesMascotaTrabajador.php?id='.$field1name.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>Ver</button></a></td>

            <td><button><a href="publicar.php?id='.$field1name.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>Publicar</button></td>

            <td><button><a href="despublicar.php?id='.$field1name.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                            <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                        </svg>Despublicar</button></td>

            <td><button><a href="EditarMascota.php?id='.$field1name.'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>Editar</button></a></td>
            
            
                  
              </tr>';
        
    }
    $result->free();
} 
?>
</body>
</html>
    
</body>
</body>
</html>