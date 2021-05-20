<?php 
//Mostrar calificaciones, vista de comprador
error_reporting(0);
$rfc=$_GET['rfc'];
//con el rfc obtenido por get, creamos la carpeta encuestas donde se almacenara todas las calificaciones con mkdir.
mkdir("../encuestas/$rfc",0777,true);//declaramos en que dentro de encuestas se generen carpetas mediante el rfc del proveedor, si ya existen no pasa nada.
$listar=null; //establecemos a listar en null para después pasar valores.

$directorio=opendir("../encuestas/$rfc");//establecemos el directorio a abrir con php, como tiene la variable $rfc al final, se vuelve dinámico y abre el directorio sin importar que proveedor sea
while ($elemento=readdir($directorio)) //while para leer el directorio
{
	
if ($elemento != '.' && $elemento != '..')//si elemento es diferente a . o ..
{
	if (is_dir("../encuestas/$rfc/".$elemento)) { //si es una carpeta listar todos los elementos de su contenido dentro de la carpeta con el rfc
		

		$listar .="<li><a href='../encuestas/$rfc/$elemento' target='_blank'>$elemento/</a></li>";
	}
	else{//si no es una carpeta de igual forma mostrar todos sus elementos
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Historial de evaluaciones</title>
</head>

<?php

require("headerc.php"); //importamos el header del comprador y la conexión a la bd
require("../conexion/conexion.php");
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];//creamos una consulta y sacamos la razón social para después mostrarla en html
}


?>

<body>
    <div class="container">
        <br>
        <h3 align="center">HISTORIAL DE EVALUACIONES DE: <?php echo $razon;?> </h3>
        <h3 align="center">R.F.C. <?php echo $rfc;?> </h3>

        <ul>
            <?php echo "$listar"; ?>
            <!-- ya que mostramos el rfc y la razón social mostramos el directorio que programamos arriba de este documento-->

        </ul>
    </div>
    <?php require("footer-index.php");?>
    <!--agregamos un footer con la clase index-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>