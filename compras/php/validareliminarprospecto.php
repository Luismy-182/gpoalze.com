<?php

/*con esta consulta e instruccion dml procedemos a eliminar un prospecto y toda su carpeta de archivos*/
require("../conexion/conexion.php");
error_reporting(0);/*importamos la conexión a la bd y también quitamos los reportes de error de los unlink al eliminar archivos*/
$rfc=$_POST['rfc'];
$ruta=("../docs/$rfc");/*le indicamos la ruta y con esto se borraría toda carpeta del proveedor o prospecto junto con todos sus datos*/
function eliminardir($ruta){/*este es el nombre de nuestra función*/
    foreach (glob($ruta . "/*") as $elemento) {//con un foreach recorremos y renombramos los archivos a elemento a borrar
        if (is_dir($elemento)) {//si es un directorio pasa al siguiente directorio asta encontrar elementos
            eliminardir($elemento);
        }else {
            unlink($elemento);//si encuentra elementos, a todos los borra
        }
    }
    rmdir($ruta);//por ultimo elimina con rmdir solo el directorio
}



if (is_dir($ruta)) {
    eliminardir($ruta);// si encuentra mas carpetas dentro del directorio de igual forma las elimina de forma recursiva
}


/*recuerde, unlink sirve solo para eliminar elementos
rmdir solo sirve para eliminar carpetas, si tiene elementos no elimina, por eso trabajamos de la mano con unlink*/
$eliminar="DELETE FROM altaproveedor WHERE rfc='$rfc'"; //al final también eliminamos el registro de la bd cuando altaproveedor es el rfc que estamos empleando


$resultado=mysqli_query($con,$eliminar);
if($resultado){
    echo "<script> alert('Se ha eliminado al prospecto satisfactoriamente');
    window.location.href='compras.php';
    </script>";
}else{
    echo "<script> alert('Error al borrar al prospecto de la base de datos'); </script>";
}