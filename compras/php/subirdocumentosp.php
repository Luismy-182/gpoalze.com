<?php
require("headerpp.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/logo.ico"/>
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footable.bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Subir documentos</title>

</head>

<body class="infinity-image-container">
    <div class="container-fluid fluido">
        <div class="row ">
            <!-- IMAGE CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 d-none d-md-block "></div>
            <!-- IMAGE CONTAINER END -->

            <!-- FORM CONTAINER BEGIN -->
            <div class="col-lg-6 col-md-6 infinity-form-container">
                <div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
                    <!-- Company Logo -->
                    <div class="text-center mb-1 mt-1 logo-arriba">
                    </div>
                    <div class="text-center mb-1">
                        <h5 align="center" class="subir-doc">SUBA SU DOCUMENTACIÓN</h5>
                        <h6 align="center" class="subir-doc">(No mayor a 2 MB por archivo)</h6><br>
                    </div>
                    <!-- Form -->
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <!-- Input Box -->
                        <div class="form-input">
                            <label for="myfile">Constancia de situación fiscal</label>
                            <input type="file" name="formato_r2_alta" accept="application/pdf" required><br>

                        </div>
                        <div class="form-input">
                            <label for="myfile">Acta constitutiva (Máximo 4MB)</label>
                            <input type="file" name="form_rfc" accept="application/pdf" required><br>

                        </div>




                        <div class="form-input">

                            <label for="myfile">Identificación oficial del representante legal</label>
                            <input type="file" name="id_oficial_repre_legal" accept="application/pdf" required><br>

                        </div>
                        <div class="form-input">
                            <label for="myfile">Carta de condiciones comerciales (en hoja membretada firmada por el
                                representa legal)</label>
                            <input type="file" name="cart_cond_comerciales" accept="application/pdf" required><br>

                        </div>
                        <div class="form-input">
                            <label for="myfile">Lista de precios (en excel)</label>
                            <input type="file" name="lista_precios"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required><br>

                        </div>
                        <div class="form-input">
                            <label for="myfile">Comprobante de domicilio</label>
                            <input type="file" name="comprobante_domicilio" accept="application/pdf" required><br>

                        </div>











                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-secondary envia " name="btn"
                                value="Subir documentación"><br>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FORM CONTAINER END -->
        </div>
    </div>
    <?php
require("footer.php");

?>

    <!--<script src="../js/funciones.js"></script>
-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>


</html>