<?php
require("headerpp.php");
/*index principal de proveedores oficiales.*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico"/>
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Página principal</title>
  
</head>







<body>


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
      
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000"><!--intervalo de tiempo a cambiar milisegundos-->
        <img src="../img/carousel/empresa1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
    <h5 style="color:black"></h5><!-- justo en estos h5 y p puede escribir lo que guste como pie de slide -->
    <p style="color:black"></p>
  </div>
      </div>
      <div class="carousel-item " data-bs-interval="3000">
        <img src="../img/carousel/empresa2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
    <h5 style="color:black"></h5>
    <p style="color:black"></p>
  </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="../img/carousel/empresa3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
    <h5 style="color:black"></h5>
    <p style="color:black"></p>
  </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="../img/carousel/empresa4.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
    <h5 style="color:black"></h5>
    <p style="color:black"></p>
  </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="../img/carousel/empresa5.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
    <h5 style="color:black"></h5>
    <p style="color:black"></p>
  </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  
<!-- tenemos un carousel de bienvenida, todas las imágenes se pueden cambiar-->
<div class="imagen-contenedor">
  
<img src="../img/carousel/movil.png">
</div>




<?php
require("footer-index.php");

?>
<!--<script src="../js/funciones.js"></script>
-->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"><script>
<script src="../js/moment.js"></script>

</body>



</html>