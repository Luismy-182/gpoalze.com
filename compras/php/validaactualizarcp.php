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
$cartap_size=$_FILES['cartap']['size'];
 if($cartap_size <= 2*MB ) { 


mkdir("../docs",0777,true);
mkdir("../docs/$rfc",0777,true);
mkdir("../docs/$rfc/cartas_cumplimiento",0777,true);
mkdir("../docs/$rfc/cartas_cumplimiento/$fecha",0777,true);



$cartap=$_FILES['cartap']['name'];
$cartap_temp=$_FILES['cartap']['tmp_name'];
$ruta7="../docs/$rfc/cartas_cumplimiento/$fecha/".$cartap;
move_uploaded_file($cartap_temp,$ruta7);


$sql="UPDATE altaproveedor SET positiva='$cartap',ubicacion7='$ruta7', fecha_positiva='$fecha' WHERE rfc='$rfc'";
       
       
     

$resultado=mysqli_query($con, $sql);


if ($resultado) {
	 echo "<script type='text/javascript'>
        alert('Carta de opinión de cumplimiento actualizada exitosamente');
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