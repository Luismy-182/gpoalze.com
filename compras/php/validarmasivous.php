<?php
require("../conexion/conexion.php");

require("../conexion/credencialesphpmailer.php");

//version masiva para compradores estándar. 
//esta version es casi exactamente la misma para emails masivos, por lo cual le invito a revisar el archivo validarmasivo.php para conocer el funcionamiento al detalle de estos apartados 
$user=$_POST['user'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];


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

  $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->CharSet ='UTF-8';
/*hacemos nuestra consulta, nótese que es la misma consulta que usamos en el formulario mensaje-masivous.php solo que aquí pasa directo sin usar un arreglo, por eso decíamos que el formulario de mensaje-masivous.php era solo un espejo */
$consulta="SELECT repres_ventas, email_repre FROM altaproveedor where usuarioc='$user' and contrasena<>''";
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

}echo  "<script> alert('Se ha mandado el correo exitosamente a todos los proveedores que usted tiene asignados.');
window.location.href='compras.php';
</script>";//nunca se cerro el while a diferencia de otros archivos para mandar emails. si todo fue exitoso muestra esta alerta

//si desea mas información de phpmailer  consulte https://github.com/PHPMailer/PHPMailer








//Instantiation and passing `true` enables exceptions


    //Server settings
                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

 
    

    
   











?>