<?php
define("RECAPTCHA_V3_SECRET_KEY",'6Lc5h8AaAAAAAK44jgaVjeftYF4aCAlUzsZF40Da');

$token = $_POST['token'];
$action = $_POST['action'];
 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

// verificando la respuesta
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
  

/*importamos nuestra conexion*/
require("../conexion/conexion.php");
/*desactivamos los avisos de mkdir para que el usuario no le salga la alerta de php de que se an creado directorios*/
error_reporting(0);
/*definimos la hora por default a usar, de este modo aunque el servidor tenga otra, siempre se usara la hora de méxico*/
date_default_timezone_set('America/Mexico_City');
/*Definimos el formato a usar en hora y se lo damos a una variable*/
$fecha = date('Y-m-d  H-i-s'); 


/*esto es opcional pero sirve para definir los MB y Mb y no pelear después con el tamaño en bytes*/
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

/*Antes que nada recibimos los valores de tamaño de los documentos carta de opinión de cumplimiento y la caratula bancaria*/
$positiva_size=$_FILES['positiva']['size'];
$estadocuenta_size=$_FILES['estadocuenta']['size'];

/*si es menor o igual a 2 MB (observase que se esta multiplicando por los valores antes definidos en bytes) entonces 
me realizas toda la carga y validación del formulario de registro*/
 if($positiva_size <= 2*MB && $estadocuenta_size <= 2*MB ) { 





/*la palabra strtoupper sirve para que todo las cadenas de texto se inserten en mayúsculas, 
a excepción de correos y nombres de documentos, por lo cual solo lo ponemos en donde necesitamos*/
$razon_social=strtoupper($_POST["razon_social"]);
$giro_empresa=strtoupper($_POST["giro_empresa"]);
$rfc=strtoupper($_POST["rfc"]);

/*ahora que ya recibiste el rfc me creas un directorio que contendrá dentro de la 
carpeta docs, una carpeta con el nombre rfc del prospecto, y dentro me creas una carpeta con el nombre
cartas_cumplimiento y dentro de ahi me creas una con el nombre de la fecha actual, esto con el fin de ya ir creando
un historial del proveedor de sus carta de opinión de cumplimento*/
mkdir("../docs",0777,true);
mkdir("../docs/$rfc",0777,true);
mkdir("../docs/$rfc/cartas_cumplimiento",0777,true);
mkdir("../docs/$rfc/cartas_cumplimiento/$fecha",0777,true);



$dfc=strtoupper($_POST["dfc"]);
$dfn=$_POST["dfn"];
$colonia=strtoupper($_POST["colonia"]);
$cp=$_POST["cp"];
$municipio=strtoupper($_POST["municipio"]);
$diasc=$_POST["diasc"];
$limitec=$_POST["limitec"];

//$clase_fact=$_POST["clase_fact"];
$tiempo_entrega=$_POST["tiempo_entrega"];
//$costos=$_POST["costos"];
$clabe_banc=strtoupper($_POST["clabe_banc"]);
$pagina_web=$_POST["pagina_web"];
$banco=strtoupper($_POST["banco"]);
$cuentabancaria=$_POST["cuentabancaria"];
$correo_aviso=$_POST["correo_aviso"];
$director_general=strtoupper($_POST["director_general"]);
$telefono_dir=$_POST["telefono_dir"];
$email_dir=$_POST["email_dir"];
$repres_ventas=strtoupper($_POST["repres_ventas"]);
$tel_repre=$_POST["tel_repre"];
$email_repre=$_POST["email_repre"];
$otro_contacto=strtoupper($_POST["otro_contacto"]);
$telefono_otro=$_POST["telefono_otro"];
$email_otro=$_POST["email_otro"];
$nombre1=strtoupper($_POST["nombre1"]);
$contacto1=strtoupper($_POST["contacto1"]);
$telefono1=$_POST["telefono1"];
$nombre2=strtoupper($_POST["nombre2"]);
$contacto2=strtoupper($_POST["contacto2"]);
$telefono2=$_POST["telefono2"];


/*después de recibir los demás datos de cadenas, vamos a recibir el archivo de carta de asignación y a meterlo a su 
carpeta con la fecha actual del sistema, nótese que no usamos un $_POST como en las cadenas de caracteres, en su lugar usamos $_FILES*/
$positiva=$_FILES['positiva']['name']; /*recibimos el nombre del archivo y le damos una variable*/
$positiva_temp=$_FILES['positiva']['tmp_name'];/*a ese mismo nombre le damos un nombre temporal que servirá después para mover el documento a la carpeta*/
$ruta7="../docs/$rfc/cartas_cumplimiento/$fecha/".$positiva; /*escribimos la variable de ruta que anteriormente se creo con el mkdir (make directory) y lo metemos dentro de la carpeta con el nombre de la fecha actual*/
move_uploaded_file($positiva_temp,$ruta7);/*Por ultimo movemos el documento con su nombre temporal a la ruta anteriormente especificada */
//y asi se sube un documento y se guarda en el servidor, lo mismo aplica para los demás documentos que se van a subir.
//caratula bancaria y no estado de cuenta, lo dejo asi porque me tomara mucho cambiar la bd y los demás archivos
$estadocuenta=$_FILES['estadocuenta']['name'];
$estadocuenta_temp=$_FILES['estadocuenta']['tmp_name'];
$ruta0="../docs/$rfc/".$estadocuenta;
move_uploaded_file($estadocuenta_temp,$ruta0);

//para mas información consultar https://www.w3schools.com/php/php_file_upload.asp


 

/*validamos por post el arreglo del formulario del name costos
si se le dio click al botón submit del formulario entonces traes el arreglo de los checkbox 
y creas una variable que este vacío, (chek1) y mediante un foreach recorres el arreglo y le das el nombre de chk2
y entonces al chek1 que estaba vacío por defecto, le metes los valores encontrados en el arreglo. para después insertarlo en la bd. y 
lo mismo se aplica para los demás checkbox*/
if (isset($_POST['submit'])){
    $costos=$_POST['costos'];
    $chek1="";
    foreach($costos as $chk2){
        $chek1.=$chk2.",";
    }
}

if (isset($_POST['submit'])){
    $empresa=$_POST['empresa'];
    $empchk="";
    foreach($empresa as $chk3){
        $empchk.=$chk3.",";
    }
}





/*se insertan las variables que contienen los valores en la base de datos*/
$insertar="INSERT INTO altaproveedor 
(razon_social,giro_empresa,rfc,dfc,dfn,colonia,cp,municipio,diasc,limitec,empresa,tiempo_entrega,costos,clabe_banc,pagina_web,banco,cuentabancaria,correo_aviso,director_general,telefono_dir,email_dir,repres_ventas,tel_repre,email_repre,otro_contacto,telefono_otro,email_otro,nombre1,contacto1,telefono1,nombre2,contacto2,telefono2,usuarioc,positiva,estadocuenta,ubicacion7,ubicacion0) VALUES (
'$razon_social',
'$giro_empresa',
'$rfc',
'$dfc',
'$dfn',
'$colonia',
'$cp',
'$municipio',
'$diasc',
'$limitec',
'$empchk',
'$tiempo_entrega',
'$chek1', /*inserta los checkbox ahora ya con datos del arreglo */
'$clabe_banc',
'$pagina_web',
'$banco',
'$cuentabancaria',
'$correo_aviso',
'$director_general',
'$telefono_dir',
'$email_dir',
'$repres_ventas',
'$tel_repre',
'$email_repre',
'$otro_contacto',
'$telefono_otro',
'$email_otro',
'$nombre1',
'$contacto1',
'$telefono1',
'$nombre2',
'$contacto2',
'$telefono2',
'Sin asignar',
'$positiva', /*se inserta el nombre del documento que se subió (carta de asignación cumplimiento)*/
'$estadocuenta', /*se inserta el nombre del documento que se subió (caratula bancaria)*/
'$ruta7', /* recuerdas la variable de ruta que anteriormente generamos? pues ahora se insertara en la bd*/
'$ruta0' /* ruta del documento donde se encuentra el archivo caratula bancaria*/
)" or die(mysql_error($con)); //si algo llega a fallar con mysql_error muestras que esta pasando.

/*la palabra sin asignar hace referencia al usuarioc como llave foránea, ya que sin el, no se podrá insertar registro, porque requiere de una clave foránea para insertar
en este caso es el usuario: sin asignar, que corresponde a la primera columna de la tabla compradores*/

$resultado=mysqli_query($con, $insertar); //el resultado de todo ese enorme insert se guarda en la variable resultado
if($resultado){ //si se inserto entonces muestra la siguiente alerta de mensaje con php y javascript 
    echo "<script> alert('Gracias, en un momento validaremos su información y le notificaremos mediante correo electrónico.');
    window.location.href='login.php';
    </script>";
}else{
    echo "<script> alert('Error ya existe este prospecto en nuestra base de datos'); 
        window.location.href='registro.php';

    </script>";//si ya hay un rfc entonces muestra esta alerta
}
 }echo "<script> alert('Un documento supera el tamaño de archivo máximo permitido');
         window.history.back();

    </script>"; /*este else viene desde el inicio donde se validaban los tamaños de archivos, si el tamaño es mayor a 2mb entonces
    no me hagas nada, ni me crees carpetas, ni me valides el formulario y manda esta alerta*/
} else {
    echo "<script> alert('Error en el captcha');
         window.history.back();
    </script>";
}



?>