<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">

 
  <title>Document</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navv">
    <div class="container-fluid">
     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  txtnav" aria-current="page" href="./main.php">Home</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle txtnav" href="#" name="nav" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Generos
            </a>
            <ul class="dropdown-menu" name="nav" aria-labelledby="navbarDropdown">
              <form action="genero.php" id="formgenero" method="post">
                <li><button class="dropdown-item" name="nav" href="#" type="submit" onclick="submitForm2('2')">Terror</button></li>
                <li><button class="dropdown-item" name="nav" href="#" type="submit" onclick="submitForm2('3')">Drama</button></li>
                <li><button class="dropdown-item" name="nav" href="#" type="submit" onclick="submitForm2('1')">Accion</button></li>
                <li><button class="dropdown-item" name="nav" href="#" type="submit" onclick="submitForm2('4')">Comedia</button></li>
                <li><button class="dropdown-item" name="nav" href="#" type="submit" onclick="submitForm2('5')">Ficcion</button></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                
                <input type="hidden" name="nombregenero" id="nombregenero">
              </form>
            </ul>
          </li>
        </ul>
<!-- Button trigger modal -->
<button type="button" class="btn search" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-magnifying-glass"></i></button>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header">
        <h5 class="modal-title txtnav" id="exampleModalLabel">Buscar peliculas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input class="form-control me-2" id="busqueda" name="busqueda" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success" onclick="saludame()"><i class="fa-solid fa-magnifying-glass"></i></button>
      <div id="meter"></div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerar</button>
        
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
  </nav>



  <?php

  include "coneimg.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombregenero = $_REQUEST['nombregenero'];
    $genero = $nombregenero;
    echo $genero;
  } else {
    echo "No se ha enviado ningún dato.";
  }
  $sql2 = $conexion->query("SELECT * FROM producto WHERE gama='Herramientas'");
      
  ?>
  
    <form class="form d-flex justify-content-center" action="verpeli.php" method="post" id="formPelicula">
      <div class="d-flex justify-content-center row row-cols-4 containergr">
        <?php
        
        while ($data = $sql2->fetch_object()) {
        ?>
       
          <div class="card m-2" style="width: 13rem;">
            <div class="imagencont">
             
            </div>
            <div class="card-body">
              <p class="card-text"><?= $data->nombre ?></p>
            </div>
          </div>

        <?php
        }
        ?>
        <input type="hidden" name="nombrePelicula" id="nombrePelicula">
      </div>
    </form>
  </div>

  <script>
    function submitForm(nombre) {
      // Asignar el valor al campo oculto
      document.getElementById('nombrePelicula').value = nombre;

      // Enviar el formulario
      document.getElementById('formPelicula').submit();
    }

    function submitForm2(nombre) {
      // Asignar el valor al campo oculto
      document.getElementById('nombregenero').value = nombre;

      // Enviar el formulario
      document.getElementById('formgenero').submit();
    }
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
  <script>
    function saludame() {

      hola = document.getElementById('busqueda').value;
      console.log(hola);
      var parametros = {
        "busqueda": hola,
        "apellido": "hurtado",
        "telefono": "123456789"
      };
      $.ajax({
        data: parametros,
        url: './php/ajax.php',
        type: 'POST',

        beforeSend: function() {
          $('#meter').html("Mensjae antes de enviar");

        },
        success: function(mensaje_mostrar) {
          $('#meter').html(mensaje_mostrar);

        }
      });
    }
  </script>

</body>

</html>