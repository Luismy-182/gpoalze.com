<?php 
/*esto es básicamente lo mismo de upload.php donde se subieron todos los documentos del proveedor oficial, solo que aqui solo se sube uno, si desea mas información del
funcionamiento consulte dicho archivo*/ 
require("../conexion/conexion.php");
error_reporting(0);
session_start();
$rfc= $_SESSION['username'];
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d  H-i-s'); 


/*esto es opcional pero sirve para definir los MB y Mb y no pelear despues con el tamaño en bytes*/
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
/*tomamos solo los tamaños de entrada para compararlos*/
$lista_precios_size=$_FILES['lista_precios']['size'];

 if($lista_precios_size <= 2*MB ) { 

mkdir("../docs",0777,true);
mkdir("../docs/$rfc",0777,true);
mkdir("../docs/$rfc/lista-precios",0777,true);
mkdir("../docs/$rfc/lista-precios/$fecha",0777,true);


$lista_precios=$_FILES['lista_precios']['name'];
$lista_precios_temp=$_FILES['lista_precios']['tmp_name'];
$ruta5="../docs/$rfc/lista-precios/$fecha/".$lista_precios;
move_uploaded_file($lista_precios_temp,$ruta5);


$sql="UPDATE altaproveedor SET lista_precios='$lista_precios',ubicacion5='$ruta5' WHERE rfc='$rfc'";
       
       
     

$resultado=mysqli_query($con, $sql);


if ($resultado) {
	 echo "<script type='text/javascript'>
        alert('Lista de precios actualizada exitosamente');
        location = '/compras/php/proveedor.php';
      </script>";
}
 }else {

       echo "<script type='text/javascript'>
        alert('Error el documento es superior al limite de tamaño, inténtelo nuevamente.');
         window.history.back();
        </script>";
 
    
    }

?>