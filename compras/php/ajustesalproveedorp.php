<?php 
require("../conexion/conexion.php");

$rfc=$_GET['rfc'];

$consulta="SELECT usuario FROM comprador";
$resultado=mysqli_query($con,$consulta);
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
}


//importamos nuestra conexion a la bd, después con el rfc que obtenemos por get hacemos una consulta de la tabla altaproveedor y sacamos su razón social
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/fontawesome/css/all.css">
   <link rel="shortcut icon" href="../img/logo.ico" />
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Ajustes del proveedor</title>
</head>

<?php
require("headerc.php");

?>

<body>
<div class="container">
     <div class="form-group text-center">

<form action="validarajustesalproveedorus.php" method="POST" class="comprador">
       <i title="Ajustes del proveedor" class="fa fa-user-cog "></i><br>
<br><H3 align="center">PROVEEDOR: <?php echo $rfc;?> </H3><!--Mostramos su rfc del proveedor -->
<H5 align="center">RAZÓN SOCIAL: <?php echo $razon;?> </H5><!--Mostramos la razon social -->
<input type="hidden" name="rfc" value="<?php echo $rfc ?>"><br>
<div>
   <label>ESTATUS DEL PROVEEDOR:</label><br> 
<select name='estatus' required>
<option  class="form-control" value="">--ASIGNAR ESTATUS--</option>
<option  class="form-control" value="ACTIVO">ACTIVO</option>
<option  class="form-control" value="INACTIVO">INACTIVO</option>
</select>
</div>

<div>
   <br><label >TIPO DE PROVEEDOR:</label><br> 
<select name='tipo' required><!--select html para insertar despues los tipos de comprador-->
<option  class="form-control" value="">--ASIGNAR TIPO--</option>
<option class="form-control" value="TIPO A">TIPO A</option>
<option  class="form-control" value="TIPO B">TIPO B</option>
<option  class="form-control" value="TIPO C">TIPO C</option>
<option  class="form-control" value="NINGUNO">NINGUNO</option>
</select>
</div>
<br><input type="submit" class="ajustes-proveedor btn-secondary btn" value="Terminar ajustes">

</form>
</div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>