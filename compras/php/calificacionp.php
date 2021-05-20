<?php 
//vista proveedor
error_reporting(0);//desactivamos los errores aunque aquí no es necesario, pero igual lo dejamos por ser código reciclado de calificaciones.php
$rfc=$_GET['rfc'];
$listar=null;//establecemos a null la variable listar

$directorio=opendir("../encuestas/$rfc");
while ($elemento=readdir($directorio))  //leemos el directorio mediante un while
{
	
if ($elemento != '.' && $elemento != '..')
{
	if (is_dir("../encuestas/$rfc/".$elemento)) { //si es un directorio mostramos sus elementos y si no, de igual forma listamos sus elementos
		

		$listar .="<li><a href='../encuestas/$rfc/$elemento' target='_blank'>$elemento/</a></li>";
	}
	else{
		$listar .="<li><a href='../encuestas/$rfc/$elemento' target='_blank'>$elemento</a></li>";
	}
}



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
    <title>Historial</title>
</head>

<?php

require("headerc.php");//importamos el header del comprador
require("../conexion/conexion.php");


$rfc=$_GET['rfc'];

?>

<body>
    <div class="container">

        <H1 align="center">Calificaciones del proveedor <?php echo $rfc;?> </H1>

        <ul>
            <?php echo "$listar"; ?>
            <!--mostramos el directorio que esta en la variable listar-->

        </ul>
    </div>
    <?php require("footer.php");?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>