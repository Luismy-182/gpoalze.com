
<?php
require("headerp.php");
require("../conexion/conexion.php");
$rfc=$_GET['rfc'];
/*Formulario para actualizar la lista de precios, es solo un formulario que permite subir documentos mediante su atributo enctype*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Actualizando lista de precios</title>
</head>
<body>



<body>
<div class="container">
  <div class="form-group text-center">
<form  action="validaalp.php" method="POST" enctype="multipart/form-data" class="formulario-envia">
<i title="Actualice su lista de precios" class="fas fa-file-csv excel"></i>
<H1 align="center">Por favor actualice la lista de precios</H1>
<input type="hidden" name="rfc" value="<?php echo $rfc?>"><br>
<label for="myfile">Por favor seleccione la lista de precios que desea actualizar (En formato excel, no mayor a 2MB)</label>
<input type="file"  name="lista_precios" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required><br><br>


<input type="submit" name="btn" value="Actualizar" class="btn-secondary btn">


</form>
</div>
</div>
<script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>