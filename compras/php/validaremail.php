<?php

/*cargamos nuestras librerías*/
require("../conexion/conexion.php");

require("../conexion/credencialesphpmailer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

/*recibimos nuestros datos por post del formulario email.php*/

/*No necesitamos ninguna consulta ya que todos los datos vienen del formulario email.php */
$nombre=$_POST['nombre'];
$destino=$_POST['destino'];
$asunto=$_POST['asunto'];//el asunto que se escribió en el formulario
$body=$_POST['cuerpo'];//el cuerpo del mensaje que se escribió en el formulario











//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
/*iniciamos php mailer
las variables que encontraras a continuación vienen de credencialesphpmailer.php que cargamos al inicio*/


try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->SMTPSecure = $smtpsecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($username, $quienlomanda);
    $mail->addAddress($destino, $nombre);     //Add a recipient
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
    $mail->Subject = $asunto; //agregamos el asunto y cuerpo del mensaje que trajimos del formulario
    $mail->Body    = $body;
    $mail->CharSet ='UTF-8';
    

    $mail->send();
   
} catch (Exception $e) {
    echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}";//si algo salio mal se muestra esta alerta
}echo  "<script> alert('Se ha mandado el correo exitosamente.');
  window.location.href='compras.php';
  </script>";//si todo salio bien se muestra esta alerta 
?>