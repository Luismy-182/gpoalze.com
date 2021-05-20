<?php
/*importamos nuestra conexion*/

/*desactivamos los avisos de mkdir para que el usuario no le salga la alerta de php de que se an creado directorios*/
require("../conexion/conexion.php");
error_reporting(0);
session_start();
$rfc= $_SESSION['username'];
/*Definimos el formato a usar en hora y se lo damos a una variable*/
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d  H-i-s'); 


/*esto es opcional pero sirve para definir los MB y Mb y no pelear despues con el tamaño en bytes*/
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
/*tomamos solo los tamaños de entrada para compararlos*/
$tamaño_formato_r2_alta=$_FILES['formato_r2_alta']['size'];
$tamaño_form_rfc=$_FILES['form_rfc']['size'];
$tamaño_id_oficial_repre_legal=$_FILES['id_oficial_repre_legal']['size'];
$tamaño_cart_cond_comerciales=$_FILES['cart_cond_comerciales']['size'];

$tamaño_lista_precios=$_FILES['lista_precios']['size'];

$tamaño_comprobante_domicilio=$_FILES['comprobante_domicilio']['size'];


/*multiplicamos el numero de MB que deseamos por los valores definidos anteriormente*/

    if($tamaño_formato_r2_alta <= 2*MB && $tamaño_form_rfc <= 4*MB && $tamaño_id_oficial_repre_legal <= 2*MB && $tamaño_cart_cond_comerciales <= 2*MB && $tamaño_lista_precios <= 2*MB && $tamaño_comprobante_domicilio <= 2*MB ) { 
           
/*si todos los archivos son menores o igual a 2MB y la carta constitutiva menor a 4MB procede a crear los documentos, si no mandara un error y no subirá nada asta que el tamaño sea correcto*/

/*ahora que ya recibiste el rfc me creas un directorio que contendrá dentro de la 
carpeta docs, una carpeta con el nombre rfc del prospecto, y dentro me creas una carpeta con el nombre
lista_precios y dentro de ahi me creas una con el nombre de la fecha actual, esto con el fin de ya ir creando
un historial del proveedor de sus listas de precios*/
mkdir("../docs",0777,true);
mkdir("../docs/$rfc",0777,true);
mkdir("../docs/$rfc/lista-precios",0777,true);
mkdir("../docs/$rfc/lista-precios/$fecha",0777,true);




/*vamos a recibir los archivos y a meterlos a su 
carpeta con la fecha actual del sistema, nótese que no usamos un $_POST como en las cadenas de caracteres, en su lugar usamos $_FILES*/
$formato_r2_alta=$_FILES['formato_r2_alta']['name'];/*recibimos el nombre del archivo y le damos una variable*/
$formato_r2_alta_temp=$_FILES['formato_r2_alta']['tmp_name'];/*a ese mismo nombre le damos un nombre temporal que servirá después para mover el documento a la carpeta*/
$ruta1="../docs/$rfc/".$formato_r2_alta; /*escribimos la variable de ruta que anteriormente se creo con el mkdir (make directory) este no genera historial y no requiere carpetas con nombre de fecha*/
move_uploaded_file($formato_r2_alta_temp,$ruta1);/*Por ultimo movemos el documento con su nombre temporal a la ruta anteriormente especificada */
//y asi se sube un documento y se guarda en el servidor, lo mismo aplica para los demás documentos que se van a subir.


$form_rfc=$_FILES['form_rfc']['name'];
$form_rfc_temp=$_FILES['form_rfc']['tmp_name'];
$ruta2="../docs/$rfc/".$form_rfc;
move_uploaded_file($form_rfc_temp,$ruta2);



$id_oficial_repre_legal=$_FILES['id_oficial_repre_legal']['name'];
$id_oficial_repre_legal_temp=$_FILES['id_oficial_repre_legal']['tmp_name'];
$ruta3="../docs/$rfc/".$id_oficial_repre_legal;
move_uploaded_file($id_oficial_repre_legal_temp,$ruta3);




$cart_cond_comerciales=$_FILES['cart_cond_comerciales']['name'];
$cart_cond_comerciales_temp=$_FILES['cart_cond_comerciales']['tmp_name'];
$ruta4="../docs/$rfc/".$cart_cond_comerciales;
move_uploaded_file($cart_cond_comerciales_temp,$ruta4);


/*vamos a recibir los archivos y a meterlos a su 
carpeta con la fecha actual del sistema, nótese que no usamos un $_POST como en las cadenas de caracteres, en su lugar usamos $_FILES*/
$lista_precios=$_FILES['lista_precios']['name'];
$lista_precios_temp=$_FILES['lista_precios']['tmp_name'];
$ruta5="../docs/$rfc/lista-precios/$fecha/".$lista_precios;//en este caso que si necesitamos generar historial, le pasamos la fecha antes de arrojar el documento y con esto tenemos un historial de insertado
move_uploaded_file($lista_precios_temp,$ruta5);


$comprobante_domicilio=$_FILES['comprobante_domicilio']['name'];
$comprobante_domicilio_temp=$_FILES['comprobante_domicilio']['tmp_name'];
$ruta6="../docs/$rfc/".$comprobante_domicilio;
move_uploaded_file($comprobante_domicilio_temp,$ruta6);


       
       
       $sql="UPDATE altaproveedor SET formato_r2_alta='$formato_r2_alta', form_rfc='$form_rfc',id_oficial_repre_legal='$id_oficial_repre_legal',cart_cond_comerciales='$cart_cond_comerciales',lista_precios='$lista_precios',comprobante_domicilio='$comprobante_domicilio',ubicacion1='$ruta1',ubicacion2='$ruta2',ubicacion3='$ruta3',ubicacion4='$ruta4',ubicacion5='$ruta5',ubicacion6='$ruta6',fecha_subidad='$fecha' WHERE rfc='$rfc'";
       
       
     

$resultado=mysqli_query($con, $sql);

if($resultado){
       echo "<script type='text/javascript'>
        alert('Se ha enviado la documentación correctamente.');
        location = '/compras/php/proveedor.php';
      </script>";
}



    } else {

       echo "<script type='text/javascript'>
        alert('Error un documento a superado el limite de tamaño, inténtelo nuevamente.');
         window.history.back();
        </script>";//si los documentos estaban sobre el valor de tamaño, entonces no hace nada de lo anterior y manda esta alerta
 
    
    }


?>
