<?php
//Esto es codigo reciclado de recoveryproveedor.php por lo cual hace exactamente lo mismo solo cambia la tabla y los datos a mostrar/*
/*importamos nuestra conexion a la bd y nuestras librerías a phpmailer, asi como también importamos el php con las credenciales ya definidas para el envió de emails*/
require("../conexion/conexion.php");
require("../conexion/credencialesphpmailer.php");

$email = $_POST['email'];
/*traemos el email que se escribio en el formulario por post*/

$consulta2 = "SELECT*FROM comprador WHERE  correo='$email'";
/*Nuestra consulta dice, seleccioname todos los campos de la tabla comprador cuando el correo del comprador de la bd coincida con el email escrito en el formulario*/
$resultado2 = mysqli_query($con, $consulta2);
$comprador = mysqli_num_rows($resultado2);




//while del comprador
        while ($mostrar = mysqli_fetch_array($resultado2)) {//ejecutamos nuestra consulta mediante un while

            $usuario=$mostrar['usuario']; //tomamos el usuario y la contrasena de la tabla comprador, para después insertarlo en los datos de envió de mensaje
            $contrasena = $mostrar['contrasena'];
            
        }








/**empieza el email del comprador */



        //empieza el phpmailer
        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  
  
  //Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
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
      $mail->setFrom($username, $quienlomanda); //quien lo manda
      $mail->addAddress($email, $usuario);     //Add a recipient destino y nombre
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
      $mail->Subject = 'RECUPERACIÓN DE CUENTA. PORTAL DE PROVEEDORES GRUPO ALZE. ESTE CORREO SE GENERA DE FORMA AUTOMÁTICA'; //asunto
      $mail->Body    = $usuario.' ha recuperado sus contraseñas. <br> Se anexan sus datos de acceso a nuestro portal de Proveedores:<br> USUARIO '.$usuario.' <br> contraseña '.$contrasena.' <br> *Este correo se genera de forma automática y no es necesario responder este mensaje.'; //cuerpo del mensaje
      $mail->CharSet ='UTF-8';
      
  
      $mail->send();
  } catch (Exception $e) {
      echo "Hubo un error al mandar el mensaje: {$mail->ErrorInfo}";
  }echo "<script> alert(''Se envían sus contraseñas al correo registrado');
  window.location.href='login.php';
  </script>";
















