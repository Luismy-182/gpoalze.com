<?php
require("headerp.php");
require("../conexion/conexion.php");
$rfc=$_GET['rfc'];
/*Formulario para actualizar el estado de cuenta, es solo un formulario que permite subir documentos mediante su atributo enctype*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Actualizando el estado de cuenta</title>
</head>
<body>



<body>
<div class="container">
      <div class="form-group text-center">

<form  action="validaactualizarnuestro_estado.php" method="POST" enctype="multipart/form-data">
<i title="Actualice el estado de cuenta" class="fas fa-file-csv excel"></i>

<H1 align="center">Por favor actualice el estado de cuenta</H1>
<input type="hidden" name="rfc" value="<?php echo $rfc?>"><br>
<label for="myfile">Por favor seleccione el documento de estado de cuenta (en formato Excel, no mayor a 2MB):</label>
<input type="file"  name="nuestro_estado"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required><br><br>
<input type="submit" name="btn" value="Actualizar" >
</form>
</div>
</div>
</body>