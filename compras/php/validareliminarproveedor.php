<?php


/*esto es solo un espejo de validarelimnarprospecto.php por lo cual es exactamente el mismo código 
y no necesita ser documentado, si desea saber el funcionamiento, revise dicho archivo*/
require("../conexion/conexion.php");
error_reporting(0);
$rfc=$_POST['rfc'];
$ruta=("../docs/$rfc");
function eliminardir($ruta){
    foreach (glob($ruta . "/*") as $elemento) {
        if (is_dir($elemento)) {
            eliminardir($elemento);
        }else {
            unlink($elemento);
        }
    }
    rmdir($ruta);
}


if (is_dir($ruta)) {
    eliminardir($ruta);
}

$eliminar="DELETE FROM altaproveedor WHERE rfc='$rfc'";


$resultado=mysqli_query($con,$eliminar);

if($resultado){
    echo "<script> alert('Se ha eliminado al proveedor satisfactoriamente');
    window.location.href='compras.php';
    </script>";
}else{
    echo "<script> alert('Error al borrar al proveedor de la base de datos'); </script>";
}

?>