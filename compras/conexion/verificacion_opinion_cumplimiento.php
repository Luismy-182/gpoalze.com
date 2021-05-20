<?php
require("conexion.php");

require("credencialesphpmailer.php");


$asunto='carta opinión de de cumplimiento Grupo Alze';
$mensaje='Estimado proveedor le recordamos actualizar su carta de opinión de cumplimiento, desde el portal de proveedores Grupo Alze, en el apartado ver mi documentación. <br>
Aprovechamos para enviarle un cordial saludo. <br> Atte. El departamento de compras Grupo Alze. <br> *No es necesario responder a este correo.';

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
//hacer la consulta y tomar todos los emails que pertenecen al comprador
  $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->CharSet ='UTF-8';

$consulta="SELECT email_repre, repres_ventas FROM altaproveedor WHERE (DATEDIFF(now(),fecha_positiva)) >=30 AND contrasena<>''";
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
         $respuesta .="Error: ".$mail->ErrorInfo;
  } else
	  {
    	 $respuesta ="El mensaje ha sido enviado";
	  }

}echo  "éxito al enviar";









//Instantiation and passing `true` enables exceptions


    //Server settings
                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

 
    

    
   











?>