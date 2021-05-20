<?php 
require("headerc.php");
require("../conexion/conexion.php");


//version usuario estándar. esto es una copia de mensaje-masivo.php, por lo cual no es necesario volver a documentar el código
//si desea saber como funciona, visite el documento anteriormente mencionado.

$consulta="SELECT repres_ventas, email_repre FROM altaproveedor where usuarioc='$user' and contrasena<>''";//la unica diferencia es que seleccionara todos los proveedores cuando su usuario exista en ellos, y su contrasena tenga algo (solo para validar que sean proveedores oficiales)
$resultado=mysqli_query($con,$consulta);
$proveedores = array();
$emails=array();

while ($mostrar=mysqli_fetch_array($resultado)) {

$proveedor[]=$mostrar['repres_ventas'];
$email[]=$mostrar['email_repre'];
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Mensaje masivo</title>
</head>


<body>
    <div class="container principal">


        <form action="validarmasivous.php" method="POST" class="email-comprador">
            <div class="form-group">
                <div class="row">
                    <div class="col text-center">
                        <i class="fas fa-mail-bulk email-icono"></i>
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label class="font-weight-bold">Para</label>
                    </div>
                    <div class="col">
                        <span><?php
          
          foreach ($proveedor as $proveedores) {
    echo $proveedores, ','; }?></span>
                        <input type="hidden" name="user" value="<?php echo $user;?>">
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailDestination" class="font-weight-bold">Destino</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="emailDestination" name="destino" placeholder="Para"
                            required value="<?php
          
          foreach ($email as $emails) {
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

    <!-- JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>