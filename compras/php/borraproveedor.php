<?php 
require("../conexion/conexion.php");
//importamos nuestra conexion a la bd, después con el rfc que obtenemos por get hacemos una consulta de la tabla altaproveedor y sacamos su razón social
$rfc=$_GET['rfc'];
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
  
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 

    <title>Eliminando proveedor</title>
</head>

<?php
require("headerc.php");

?>

<body>
<div class="container">

  <div class="form-group text-center">





<form action="validareliminarproveedor.php" method="POST" class="comprador" >
    <i title="Eliminación de proveedor" class="fa fa-user-minus"></i>
<H1>Eliminación de proveedor</H1>
<input type="hidden" name="rfc" value="<?php echo $rfc;?>">
<label for="myfile">Esta a punto de eliminar al proveedor <?php echo $razon; ?> ¿Esta seguro?, ¡No se puede revertir!</label><br>
<br><!--Es un simple formulario de eliminación de usuario, por lo cual si se ejecuta el botón, pasaremos a eliminarlo -->
<input type="submit" value="Si, eliminar al proveedor" class="btn btn-secondary">

</form>
</div>
</div>