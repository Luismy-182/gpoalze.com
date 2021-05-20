<?php 
/*esto es un espejo de historial_estadocuenta.php por lo cual no es necesario volver a documentar el código, si quiere saber como funciona abra el documento */
error_reporting(0);
$rfc=$_GET['rfc'];
$listar=null;
mkdir("../encuestas/$rfc",0777);
$directorio=opendir("../encuestas/$rfc");
while ($elemento=readdir($directorio)) 
{
	
if ($elemento != '.' && $elemento != '..')
{
	if (is_dir("../encuestas/$rfc/".$elemento)) {
		

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Evaluación</title>
</head>

<?php

require("headerp.php");
require("../conexion/conexion.php");


$rfc=$_GET['rfc'];

?>

<body>
    <div class="container">

        <H1 align="center">A continuación, se presenta su evaluación como proveedor.</H1>

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