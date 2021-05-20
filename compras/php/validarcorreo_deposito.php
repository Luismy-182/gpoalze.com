<?php


/*procedemos a cargar nuestras conexiones y credenciales de phpmailer*/
require("../conexion/conexion.php");

require("../conexion/credencialesphpmailer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


/*recibimos nuestros datos por post del formulario email.php que a su vez recibió sus datos del link que se clickeo*/

$nombre=$_POST['nombre'];
$destino=$_POST['destino'];
$asunto=$_POST['asunto'];
$body=$_POST['cuerpo'];











//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //todo esto son variables de credencialesphpmailer.php
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->SMTPSecure = $smtpsecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($username, $quienlomanda);//siguen siendo variables de credencialesphpmailer.php
    $mail->addAddress($destino, $nombre);     //agregamos las variables de destino y nombre que sacamos del while
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
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto; //insertamos el asunto que pusimos en el formulario con los $_post
    $mail->Body    = $body; //insertamos el cuerpo del mensaje que escribimos en el formulario
    $mail->CharSet ='UTF-8';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}";//si hubo un error muestra este mensaje
}echo  "<script> alert('Se ha mandado el correo exitosamente.');
  window.location.href='compras.php';
  </script>";//si hubo exito muestra esta alerta
?>