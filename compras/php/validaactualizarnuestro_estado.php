<?php 
/*esto es básicamente lo mismo de upload.php donde se subieron todos los documentos del proveedor oficial, solo que aqui solo se sube uno, si desea mas información del
funcionamiento consulte dicho archivo*/ 
require("../conexion/conexion.php");
error_reporting(0);
SESSION_START();
$rfc= $_SESSION['username'];
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d  H-i-s'); 

/*esto es opcional pero sirve para definir los MB y Mb y no pelear despues con el tamaño en bytes*/
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
/*tomamos solo los tamaños de entrada para compararlos*/
$nuestro_estado_size=$_FILES['nuestro_estado']['size'];
 if($nuestro_estado_size <= 2*MB ) { 

mkdir("../docs",0777,true);
mkdir("../docs/$rfc",0777,true);
mkdir("../docs/$rfc/estados_cuenta",0777,true);
mkdir("../docs/$rfc/estados_cuenta/$fecha",0777,true);




$nuestro_estado=$_FILES['nuestro_estado']['name'];
$nuestro_estado_temp=$_FILES['nuestro_estado']['tmp_name'];
$ruta_estadoc="../docs/$rfc/estados_cuenta/$fecha/".$nuestro_estado;
move_uploaded_file($nuestro_estado_temp,$ruta_estadoc);


$sql="UPDATE altaproveedor SET nuestro_estado='$nuestro_estado',ubnuestro_estado='$ruta_estadoc',fecha_nue='$fecha' WHERE rfc='$rfc'";
       
       
     

$resultado=mysqli_query($con, $sql);


if ($resultado) {
	 echo "<script type='text/javascript'>
        alert('Se ha actualizado el estado de cuenta exitosamente');
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