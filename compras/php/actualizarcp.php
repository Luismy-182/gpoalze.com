<?php
require("headerp.php");
require("../conexion/conexion.php");
$rfc=$_GET['rfc'];
/*Formulario para actualizar la carta de opinión de cumplimiento, es solo un formulario que permite subir documentos mediante su atributo enctype*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
<link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Actualizando carta de opinión de cumplimiento</title>
</head>
<body>



<body>
<div class="container">
  <div class="form-group text-center">
<form  action="validaactualizarcp.php" method="POST" enctype="multipart/form-data" class="formulario-envia">
<i title="Actualice la carta de opinión de cumplimiento" class="fas fa-file-pdf pdf"></i>
<H1 align="center">Por favor actualice la carta de opinión de cumplimiento</H1>
<input type="hidden" name="rfc" value="<?php echo $rfc?>"><br>
<label for="myfile">Seleccione la carta de opinión de cumplimiento a actualizar (en formato pdf, no mayor a 2MB)</label><br><br>
<input type="file"  name="cartap" accept="application/pdf" required><br><br>

<input type="submit" name="btn" value="Actualizar" class="btn-secondary btn">

</form>
</div>

</div>
<!--Agregamos nuestros js-->
<script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>