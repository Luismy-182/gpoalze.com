<?php 
/*este apartado es para ver el directorio que contiene el historial del estado de cuenta del proveedor oficial
por lo cual, recibimos el rfc mediante get que anteriormente mandamos al pulsar el icono del reloj.

*/
$rfc=$_GET['rfc'];
require("../conexion/conexion.php");
error_reporting(0);//quitamos los mensajes de alerta al crear carpetas con php
mkdir("../docs/$rfc/estados_cuenta",0777,true);//indicamos el directorio donde estarán alojados los historiales y si no existe pues lo creamos
$listar=null;//establecemos la variable listar a null para después pasarle valores
$directorio=opendir("../docs/$rfc/estados_cuenta/");//indicamos donde abrir el directorio
while ($elemento=readdir($directorio)) 
{
	
if ($elemento != '.' && $elemento != '..')//si el directorio no contiene estos caracteres entonces
{
	if (is_dir("../docs/$rfc/estados_cuenta/".$elemento)) {//si es un directorio listaremos los elementos que estén en esa ubicación mediante un li y un a href 
		

		$listar .="<li><a href='../docs/$rfc/estados_cuenta/$elemento' target='_blank'>$elemento/</a></li>";//con target _blank abrimos una nueva pestaña
	}
	else{//si no es un directorio de igual forma listamos su contenido
		$listar .="<li><a href='../docs/$rfc/estados_cuenta/$elemento' target='_blank'>$elemento</a></li>";
	}
}



}
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social']; //mediante esta consulta sacamos la razón social para después mostrarla 
}
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Historial del estado de cuenta</title>
</head>

<?php

require("headerc.php");


$rfc=$_GET['rfc'];



?>

<body>
    <div class="container">
        <br>
        <h3 align="center">Historial del estado de cuenta: <?php echo $razon;?> </h3>

        <ul>
            <?php echo "$listar"; ?>
            <!--Ahora lo único que hacemos es listar los elementos del directorio mediante una lista -->

        </ul>
    </div>
    <?php require("footer-index.php");?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>