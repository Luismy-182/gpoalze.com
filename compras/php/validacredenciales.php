<?php
require("../conexion/conexion.php");
require("../conexion/credencialesphpmailer.php");
/*importamos conexión y las credenciales personalizadas de nuestro phpmailer*/
session_start();//le pasamos la sesión de comprador 
$user=$_SESSION['user'];
$rfc=$_POST["rfc"];
/*clave aleatoria, una forma mas de agradecer el buen trato del personal del departamento de sistemas, al practicante Miguel Angel Suárez Pluma*/ 
$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
$numerodeletras=10; //numero de caracteres que tendrá la clave aleatoria
$contrasena = ""; //variable para almacenar la cadena generada
for($i=0;$i<$numerodeletras;$i++)
{
    $contrasena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
entre el rango 0 a Numero de letras que tiene la cadena */
}








$usuarioc=$_POST["usuarioc"];
date_default_timezone_set('America/Mexico_City');
$fecha = date('Y-m-d H-i-s'); //formato de fecha


$sql="UPDATE altaproveedor SET contrasena='$contrasena', usuarioc='$usuarioc',fecha_autorizacion='$fecha' WHERE rfc='$rfc'"; //insertamos la contrasena generada y también la fecha de autorización.


$resultado=mysqli_query($con,$sql);



    $consul="SELECT*FROM altaproveedor WHERE rfc='$rfc'"; //ahora consultamos todos los datos de la alta de proveedor
    $res=mysqli_query($con,$consul);
while($mostrar=mysqli_fetch_array($res)){//con la consulta anterior mediante un while recorremos los datos

    
    $nombre=$mostrar['razon_social'];//y extraemos estos datos para darles una variable y poderlos usar fuera del while para personalizar el email que llevara las credenciales
    $destino=$mostrar['email_repre'];
    $r=$mostrar['rfc'];
    $clave=$mostrar['contrasena'];


        }


        //empieza el phpmailer
        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  

  
  
  

  
  
  
  
  
  
  
  
  
  
  //Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);
  //muchos valores tienen variables que a su vez contienen las credenciales necesarias de nuestro correo y estan en credencialesphpmailer.php
  try {
      //Server settings
      $mail->SMTPDebug = 0;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $host;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $username;                     // vienen de credencialesphpmailer.php
      $mail->Password   = $password;                               //SMTP password
      $mail->SMTPSecure = $smtpsecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = $port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom('compras@gpoalze.com', 'Compras Grupo Alze'); //quien lo manda
      $mail->addAddress($destino, $nombre);     //pasamos el destino y nombre con las variable que declaramos en el while pasado
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
      $mail->Subject = 'ASIGNACIÓN DE CREDENCIALES PARA PROVEEDOR DE GRUPO ALZE, ESTE CORREO SE GENERA DE FORMA AUTOMÁTICA'; //asunto predefinido al enviar credenciales
      $mail->Body    = 'FELICIDADES¡<br>'.$nombre.' se ha revisado su información y le notificamos que ahora ya es un proveedor autorizado dentro del Grupo ALZE. <br>
       Se anexan sus datos de acceso a nuestro portal de Proveedores:<br> USUARIO '.$r.'<br> contraseña '.$clave.' <br>
       Link al portal: https://gpoalze.com/compras/php/login.php <br>
       *Este correo se genera de forma automática y no es necesario responder este mensaje.'; //cuerpo del mensaje predefinido
      $mail->CharSet ='UTF-8';
      
  
      $mail->send();
  } catch (Exception $e) {
      echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}";//si hubo un error por ejemplo en el puerto o en la autentificación mandara esta instancia de error
  }echo "<script> alert('Ahora este prospecto es un proveedor oficial, se ha notificado y mandado las credenciales via email exitosamente');
  window.location.href='compras.php';
  </script>";//si no entonces mandara la alerta de exito con php y javascript y redirigirá a compras.php




























?>