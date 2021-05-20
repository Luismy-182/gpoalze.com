<?php 
require("../conexion/conexion.php");
require("headerc.php");
//importamos nuestra conexión a la bd, y nuestro header
$rfc=$_GET['rfc'];//ahora que nos envio el rfc del formulario anterior hacemos un while y sacamos la razón social de la bd
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];//le damos una variable 
}


$consulta="SELECT usuario FROM comprador";
$resultado=mysqli_query($con,$consulta);//hacemos una consulta que mas tarde nos servirá para mostrar los usuarios disponibles en el select html


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/fontawesome/css/all.css">
   <link rel="shortcut icon" href="../img/logo.ico"/>
   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Ajustes del proveedor</title>
</head>


<body>
<div class="container">
  <div class="form-group text-center">
<form action="validarajustesalproveedor.php" method="POST" class="comprador">
       <i title="Ajustes del proveedor" class="fa fa-user-cog"></i><br>

<input type="hidden" name="rfc" value="<?php echo $rfc ?>"><br>
<div>
   <h3>PROVEEDOR: <?php echo $rfc;?></h3>
<h5>RAZÓN SOCIAL: <?php echo $razon;?> </h5><!--variable que sacamos al inicio del html mediante una consulta y while-->
<br><label>Seleccione al comprador responsable</label><br> 
<select name='usuario' required><!--Select html que muestra los usuarios que estan ya en la bd, lo que se seleccione se guardara en el name usuario y después se insertara en la bd-->
<option  class="form-control" value="0">--Asignar comprador--</option>
<?php while($mostrar=mysqli_fetch_array($resultado)) { ?> <!--con este while mostramos todos los usuarios de la tabla comprador-->
<option value="<?php echo $mostrar['usuario']; ?>"><?php echo $mostrar['usuario'];?> </option><!-- Aqui ocurren dos cosas, le estamos dando los valores de la columna usuario y al mismo tiempo estamos imprimiendo en el select html el nombre de los compradores de la bd -->
<?php } ?>
</select>
</div>

<div>
  <br> <label>ESTATUS DEL PROVEEDOR:</label><br> 
<select name='estatus' required><!--select que muestra datos de status de proveedor, de acuerdo a lo que se seleccione después pasara a insertarse a la bd-->
<option  class="form-control" value="">--ASIGNAR ESTATUS--</option>
<option  class="form-control" value="ACTIVO">ACTIVO</option>
<option  class="form-control" value="INACTIVO">INACTIVO</option>
</select>
</div>

<div>
   <br><label >TIPO DE PROVEEDOR:</label><br> 
<select name='tipo' required>
<option  class="form-control" value="">--ASIGNAR TIPO--</option>
<option class="form-control" value="TIPO A">TIPO A</option>
<option  class="form-control" value="TIPO B">TIPO B</option>
<option  class="form-control" value="TIPO C">TIPO C</option>
<option  class="form-control" value="NINGUNO">NINGUNO</option>
</select>
</div>
<br><input type="submit" class="ajustes-proveedor btn-secondary btn" value="Terminar ajustes"><!--se mandan los ajustes a validar y a insertar a la bd-->
</form>
</div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>