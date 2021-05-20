 <?php
/*importamos nuestra conexion a la bd y nuestras librerías a phpmailer, asi como también importamos el php con las credenciales ya definidas*/
require("../conexion/conexion.php");
require("../conexion/credencialesphpmailer.php");

$email = $_POST['email'];
/*traemos el email que se escribio en el formulario por post*/

/*se supone que para acceder al portal se toma el rfc como nombre de usuario único y su contraseña de proveedor generada aleatoriamente */
$consulta = "SELECT*FROM altaproveedor WHERE email_repre = '$email'"; //el email se comprara con el campo email del representante de ventas de la bd (email_repre)
/*Nuestra consulta dice, seleccioname todos los campos de la tabla alta proveedor cuando el email del representante de ventas de la bd coincida con el email de la escrito en el formulario*/
$resultado = mysqli_query($con, $consulta);

$proveedor = mysqli_num_rows($resultado); //guardamos nuestra consulta 

while ($mostrar = mysqli_fetch_array($resultado)) { //ejecutamos nuestra consulta mediante un while

    $rfc = $mostrar['rfc'];
    $repres_ventas = $mostrar['razon_social'];
    $contrasena = $mostrar['contrasena'];
//de todos los datos que consultaste muéstrame y dale unas variables al rfc la razón social y la contraseña 
}

/**empieza el email del proveedor */

//empieza el phpmailer, cargamos nuestras librerías de phpmailer que se encuentran en la carpeta phpmailer y sus archivos necesarios
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\Exception; //usamos estos archivos
use PHPMailer\PHPMailer\PHPMailer;

//estos comentarios son por default de la librería y están en ingles, por lo cual no es necesario agregar un comentario personalizado, solo para aquellos relevantes.
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = $host; //Set the SMTP server to send through. usamos la variable host que contiene el valor de las credenciales en el archivo que importamos
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = $username; //SMTP username. usamos la variable de nombre de usuario de las credenciales
    $mail->Password = $password; //SMTP password. ponemos la variable de clave
    $mail->SMTPSecure =$smtpsecure; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = $port; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($username, $quienlomanda); //quien lo manda. este valor igualmente ya esta definido en las credenciales de phpmailer
    $mail->addAddress($email, $repres_ventas); //Add a recipient, este valor igualmente ya esta definido en las credenciales de phpmailer
    /*
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
     */
    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'RECUPERACIÓN DE CUENTA, PORTAL DE PROVEEDORES GRUPO ALZE. ESTE CORREO SE GENERA DE FORMA AUTOMÁTICA'; //asunto y se genera manualmente. asunto predefinido
    $mail->Body = $repres_ventas.' ha recuperado sus contraseñas. <br> Se anexan sus datos de acceso a nuestro portal de Proveedores:<br> USUARIO '.$rfc.'<br> CONTRASEÑA '.$contrasena.' <br> *Este correo se genera de forma automática y no es necesario responder este mensaje.'; //cuerpo del mensaje ya contiene los nombres de la bd a los que se encontró coincidencia
    $mail->CharSet = 'UTF-8';

    $mail->send();
} catch (Exception $e) {
    echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}"; //si hay un error por ejemplo en la autentificaron, muestra el error para el desarrollador
}echo "<script> alert('Se envían sus contraseñas al correo registrado');
  window.location.href='login.php';
  </script>";//si hubo éxito muestra esta alerta.

?>