<?php 
require("headerc.php");
require("../conexion/conexion.php");
/*este es el apartado para enviar email al representante de ventas, con lo cual solo crearemos un formulario de mensaje y solo recibiremos 
valores con get que anteriormente habíamos mandado de la tabla al seleccionar el link del email y los introduciremos en los values de los input.*/

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

    <title>Email</title>
</head>


<body>
    <div class="container principal">


        <form action="validaremail.php" method="POST" class="email-comprador">
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
                        <span><?= $_GET['repres_ventas']; ?></span>
                        <input type="hidden" name="nombre" value="<?= $_GET['repres_ventas']; ?>">
                    </div>
                </div>
                <div class="row row_margin_top">
                    <div class="col-2">
                        <label for="emailDestination" class="font-weight-bold">Destino</label>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" id="emailDestination" name="destino" placeholder="Para"
                            required value="<?= $_GET['email_repre']; ?>">
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
    <!-- Optional JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>