<?php 
require("headerc.php");
require("../conexion/conexion.php");
/*despues de dar click al href de email para aviso de deposito, nos abre este formulario, el cual no tiene nada de especial
solo recibe por el metodo GET los datos del proveedor de aviso de deposito que se enviaron mediante el símbolo ?
ahora solo se introduce los get en los values y procedemos a validar los datos y a mandarlos con php mailer
*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <title>Email para aviso de depósito</title>
</head>


<body>
    <div class="container principal">


        <form action="validarcorreo_deposito.php" method="POST" class="email-comprador">
            <div class="form-group">
                <div class="row">
                    <div class="col text-center">
                        <i title="Redactar email" class="fas fa-envelope-open-text email-icono"></i>
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label class="font-weight-bold">Para</label>
                    </div>
                    <div class="col">
                        <span><?= $_GET['razon_social']; ?></span>
                        <input type="hidden" name="nombre" value="<?= $_GET['razon_social']; ?>">
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailDestination" class="font-weight-bold">Destino</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="emailDestination" name="destino" placeholder="Para"
                            required value="<?= $_GET['correo_aviso']; ?>">
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
                        <textarea id="emailBody" name="cuerpo" class="form-control" rows="5" required></textarea>
                    </div>
                </div>

            </div>

            <div class="form-group text-center">
                <input type="submit" value="Enviar" class="btn enviar-email">
            </div>
            <div class="form-group text-center">

            </div>
        </form>


    </div>

    <?php require("footer-index.php");?>
    <!--usamos un footer index que nos servirá para posicionar el pie de pagina asta el final aunque el cuerpo del documento haya terminado antes-->
    <!-- importamos nuestro JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>