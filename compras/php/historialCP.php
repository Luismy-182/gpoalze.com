<?php 

/*esto es un espejo de historial_estadocuenta.php por lo cual no es necesario volver a documentar el código, si quiere saber como funciona abra el documento */
$rfc=$_GET['rfc'];
error_reporting(0);
require("../conexion/conexion.php");
mkdir("../docs/$rfc/cartas_cumplimiento",0777,true);
$listar=null;
$directorio=opendir("../docs/$rfc/cartas_cumplimiento/");
while ($elemento=readdir($directorio)) 
{
	
if ($elemento != '.' && $elemento != '..')
{
	if (is_dir("../docs/$rfc/cartas_cumplimiento/".$elemento)) {
		

		$listar .="<li><a href='../docs/$rfc/cartas_cumplimiento/$elemento' target='_blank'>$elemento/</a></li>";
	}
	else{
		$listar .="<li><a href='../docs/$rfc/cartas_cumplimiento/$elemento' target='_blank'>$elemento</a></li>";
	}
}



}
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
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="shortcut icon" href="../img/logo.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Historial, carta de opinión de cumplimiento</title>
</head>

<?php

require("headerc.php");
require("../conexion/conexion.php");


$rfc=$_GET['rfc'];

?>

<body>
    <div class="container">
        <br>
        <h3 align="center">HISTORIAL, CARTA DE OPINIÓN DE CUMPLIMIENTO: <?php echo $razon;?> </h3>

        <ul>
            <?php echo "$listar"; ?>

        </ul>
    </div>
    <?php require("footer-index.php");?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>