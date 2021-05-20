<?php 
require("headerc.php");
require("../conexion/conexion.php");
if ($tipo=='ESTANDAR') {
  header("location:mensaje-masivous.php");
}

/*cargamos nuestra conexión a la bd y nuestro header de comprador
si el tipo de usuario es estándar se diseccionara a otra version de mensajes masivos pero sin tantos privilegios
*/

//version usuario administrador; puede ver todos los correos de todos los proveedores y de todos los compradores

/*Esto es solo un espejo para ver lo que esta pasando al fondo al tomar todos los emails de todos los proveedores, por lo cual si usted
edita los correo que salen, no surtira efecto cuando se manden los emails. solo sirve para ver que remitentes se están tomando*/
$consulta="SELECT repres_ventas, email_repre FROM altaproveedor WHERE contrasena<>''";//selecciona todos campos de email y representante de ventas de la tabla altaproveedor cuando su campo contrasena tenga una cadena de texto (que ya sean proveedores oficiales)
$resultado=mysqli_query($con,$consulta);
$proveedores = array();//declaramos nuestros arrays de proveedores y de emails
$emails=array();

while ($mostrar=mysqli_fetch_array($resultado)) {

$proveedor[]=$mostrar['repres_ventas'];
$email[]=$mostrar['email_repre'];
//ahora con el while recorremos todos los registros y le asignamos que se guarden en ese arreglo que anteriormente definimos
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico"/>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Mensaje masivo</title>
</head>


<body>
    <div class="container principal">


        <form action="validarmasivo.php" method="POST" class="email-comprador">
            <div class="form-group">
                <div class="row">
                    <div class="col text-center">
                        <i title="Email masivo a todos los proveedores" class="fas fa-mail-bulk email-icono"></i>
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label class="font-weight-bold">Para</label>
                    </div>
                    <div class="col">
                        <span><?php
          
          foreach ($proveedor as $proveedores) { //en este caso recorremos nuestro array con el foreach para imprimir los correos en pantalla
    echo $proveedores, ','; }?></span>
                        <input type="hidden" name="nombre" value="<?php echo $user;?>">
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailDestination" class="font-weight-bold">Destino</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="emailDestination" name="destino" placeholder="Para"
                            required value="<?php
          
          foreach ($email as $emails) {//en este caso recorremos nuestro array con el foreach para imprimir los correos en pantalla
    echo '<', $emails, '>';}?>">
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailSubject" class="font-weight-bold">Asunto</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="emailSubject" autofocus name="asunto"
                            placeholder="Asunto" required>
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailBody" class="font-weight-bold">Mensaje</label>
                    </div>
                    <div class="col">
                        <textarea id="emailBody" name="mensaje" class="form-control" rows="5"
                            placeholder="Mensaje"></textarea>
                        <!--escribirmos el asunto y el cuerpo y se mandaran por post a validar y a enviar -->
                    </div>
                </div>

            </div>

            <div class="form-group text-center">
                <input type="submit" name="newEmail" value="Enviar" class="btn enviar-email">
            </div>
            <div class="form-group text-center">

            </div>
        </form>

    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>