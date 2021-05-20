<?php
require("../conexion/conexion.php");

require("../conexion/credencialesphpmailer.php");

/*aquí se mandan todos los emails masivos del comprador administrador por lo cual todos los emails involucran todos los proveedores oficiales de todos los compradores */
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];

/*Solo recibimos el asunto y el mensaje del formulario anterior, para mandar los emails necesitaremos una consulta, y guardar todos esos emails en un array  */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);
 $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->SMTPSecure = $smtpsecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $port;    
    $mail->setFrom($username, $quienlomanda);
//llenamos los datos con las variables de credenciales que importamos arriba, credencialesphpmailer.php
  $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->CharSet ='UTF-8';
/*hacemos nuestra consulta, nótese que es la misma consulta que usamos en el formulario mensaje-masivo.php solo que aquí pasa directo sin usar un arreglo, por eso decíamos que el formulario de mensaje-masivo.php era solo un espejo */
$consulta="SELECT repres_ventas, email_repre FROM altaproveedor WHERE contrasena<>''";//selecciona todos campos de email y representante de ventas de la tabla altaproveedor cuando su campo contrasena tenga una cadena de texto (que ya sean proveedores oficiales)
$resultado=mysqli_query($con,$consulta);




while ($mostrar=mysqli_fetch_array($resultado)) {

$proveedores=$mostrar['repres_ventas'];
$emails=$mostrar['email_repre'];


   //Recipients
 $mail->ClearAllRecipients();
$mail->addAddress($emails, $proveedores);     //Add a recipient
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
  if (!$mail->send()) {
      $respuesta ="El mensaje no se pudo enviar";
         $respuesta .="Error: ".$mail->ErrorInfo;//si no se envió el mensaje esta variable se mostraría después con un echo, pero ya no se ocupo sin embargo aquí esta sin afectar a nada
  } else
	  {
    	 $respuesta ="El mensaje ha sido enviado";//si se envio el mensaje esta variable se mostraría después con un echo, pero ya no se ocupo sin embargo aquí esta sin afectar a nada
	  }

}echo  "<script> alert('Se ha mandado el correo exitosamente a todos los proveedores.');
  window.location.href='compras.php';
  </script>";//observe como no cerramos el while asta que se completo todo el proceso y mande este mensaje de éxito



//si desea mas información de phpmailer  consulte https://github.com/PHPMailer/PHPMailer


?>