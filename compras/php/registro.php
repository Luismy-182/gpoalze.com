<!DOCTYPE html>
<html lang="es">
<!-- importamos nuestras librerías y hojas de estilo -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">


    <title>Registro</title>
</head>
<!-- importamos nuestro header-->
<?php
require("headerr.php");
?>

<body>
    <!-- Creamos un contenedor con la clase container y los estilos recargados de las librerías y nuestra clase que también servirá para dar estilo con css3  -->
    <div class="container registro">
        <h1 align="center">ALTA DE PROVEEDORES</h1> <BR><br>
        <!-- la palabra reservada enctype="multipart/form-data" es para especificar que no sera un formulario normal, sino que también se usara para cargar documentos -->
        <form action="validarregistro.php" class="form-group" method="post" enctype="multipart/form-data" id="newsletterForm" onsubmit="return validar();">
            <!--En la parte onsubmit estamos haciendo referencia a un documento javascript que contiene todas las validaciones de los campos de 
            este formulario, de tal forma que se ejecuta antes de agregar a la bd y con ello protege y valida que los campos no estén vacíos o que contengan el tipo de datos que se esperan-->

            <!-- EL formulario se realiza basándonos en la información de un documento que se nos proporciono al inicio del proyecto, con el paso del tiempo ese documento 
            se empezo a ignorar algunos de sus campos, y agregaron muchos mas con el apoyo del director general, por lo cual no es 100% fiel al documento de alta de proveedor -->

            <!-- Por medio de buenas practicas de programación, muchos campos tienen el mismo 'name' de las columnas de la base de datos, pero otros no, por lo cual, con el constante cambio del documento que
    supuestamente ya era oficial, muchos apartados se han quedado con sus nombres anteriores y no se pudieron modificar en la bd, por lo cual están desarrollando
    funciones ajenas, por ejemplo: estadocuenta debería ser el name para agregar el estado de cuenta, sin embargo se usa para recibir la caratula bancaria, son detalles que por falta de tiempo no se pudo corregir
    por lo cual hay que tener muy encuenta eso y en lugar de guiarnos por los name de inputs, debemos guiarnos por los label -->

            <h2 align="center">DATOS DE LA EMPRESA </h2><br>
            <p>* Campos obligatorios</p>
            <div class="cajar1">
                <!-- usaremos algunas clases para crear contenedores y separar los registros en dos columnas en pantallas grandes -->
                <label class="alta">Escriba la razón social *</label><br>
                <input class="entrada" type="text" id="razon_social" name="razon_social" value="" required><br><br>
                <label class="alta" for="fname">Escriba el giro de la empresa *</label><br>
                <input class="entrada" type="text" id="giro_empresa" name="giro_empresa" value="" required><br>
            </div>
            <div class="cajar2">
                <label class=alta>RFC *</label><br>
                <input class="entrada" type="text" id="rfc" name="rfc" value="" required maxlength="13"><br><br>
                <label class="alta">Pagina web</label><br>
                <input class="entrada" type="text" id="pagina_web" name="pagina_web" value=""
                    style="text-transform:none"><br><br>
            </div>
            <div class="clearfix"></div>
            <!-- la clase clearfix sirve para limpiar los floats de css, y no se deben quitar del formulario, de lo contrario se distorsionara todo el diseño -->
            <h2 align="center">DATOS DE DIRECCIÓN FISCAL</h2>
            <div class="cajar1">

                <label class="alta">calle *</label><br>
                <input class="entrada" type="text" id="dfc" name="dfc" value="" required> <br><br>
                <label class="alta">Número *</label><br>
                <input class="entrada" type="text" id="dfn" name="dfn" value="" required maxlength="8"
                    onkeypress="return solonumeros(event)" onpaste="return false"><br><br>
                <label class="alta">Colonia *</label><br>
                <input class="entrada" type="text" id="colonia" name="colonia" value="" required><br>
            </div>
            <div class="cajar2">
                <label class="alta">Código postal *</label><br>
                <input maxlength="5" class="entrada" id="cp" type="text" name="cp" value="" required
                    onkeypress="return solonumeros(event)" onpaste="return false"><br><br>
                <label class="alta">Municipio y/o Delegación *</label><br>
                <input class="entrada" type="text" id="municipio" name="municipio" value="" required><br><br>
            </div>
            <div class="clearfix"></div>
            <h2 align="center">CRÉDITO</h2>

            <div class="cajar1">

                <label class="alta">Días de crédito* (Número de días)</label><br>
                <input class="entrada" maxlength="3" type="text" id="diasc" name="diasc" value="" required
                    onkeypress="return solonumeros(event)" onpaste="return false"><br><br>

                <label class="alta">Limite de crédito* (MONTO)</label><br>
                <input type="text" maxlength="7" class="entrada" id="limitec" name="limitec" value="" required
                    onkeypress="return solonumeros(event)" onpaste="return false">
            </div>
            <div class="cajar2">

                <label class="alta">Tiempo de entrega* (Días)</label><br>
                <input type="text" maxlength="3" class="entrada" id="tiempo_entrega" name="tiempo_entrega" required
                    value="" onkeypress="return solonumeros(event)" onpaste="return false"><br><br>

            </div>
            <div class="clearfix"></div>
            <div class="cajarcostos">

                <label class="alta">Costos *</label><br>
                <label class="alta"><input type="checkbox" id="costos" name="costos[]" value="FIJOS"> Fijos</label>
                <label class="alta"><input type="checkbox" name="costos[]" value="VARIABLES"> Variables</label> <br><br>
            </div>
            <!-- checkbox que funcionan con un array, y espera los checks marcados por el usuario, nótese que usan el mismo name para cada opción -->
            <div class="cajaremp">
                <label class="alta">Empresa a la que deseas brindar tus servicios o productos *</label><br><br>
                <input type="checkbox" id="empresa" name="empresa[]" value="ARAM-LUZ">ARAM-LUZ</label>
                <input type="checkbox" name="empresa[]" value="CAPITAN KLIN">CAPITAN KLIN</label>
                <input type="checkbox" name="empresa[]" value="ETIROCH">ETIROCH</label>
                <input type="checkbox" name="empresa[]" value="BETICINI">BETICINI</label>
                <input type="checkbox" name="empresa[]" value="GLOBAL">GLOBAL</label><br><br>

            </div>
            <div class="clearfix"></div>
            <br>
            <h2 align="CENTER">DATOS BANCARIOS</h2>
            <div class="cajar1">

                <label class="alta">Banco *</label><br>
                <input class="entrada" type="text" name="banco" id="banco" value="" required><br><br>
                <label class="alta">Cuenta Bancaria *</label><br>
                <input class="entrada" type="text" name="cuentabancaria" id="cuentabancaria" value="" required
                    maxlength="10" onkeypress="return solonumeros(event)" onpaste="return false">
            </div>
            <div class="cajar2">

                <label class="alta">Clabe bancaria *</label><br>
                <input class="entrada" type="text" name="clabe_banc" id="clabe_banc" value="" required maxlength="18"
                    onkeypress="return solonumeros(event)" onpaste="return false"> <br><br>

                <label class="alta">Correo electrónico para aviso de depósito *</label><br>
                <input class="entrada" type="email" name="correo_aviso" id="correo_aviso" value="" required
                    style="text-transform:none"><br>
            </div>
            <div class="cajar1">
                <!--la palabra file especifica a html5 que espera un documento y la palabra accept especifica que espera un documento pdf-->
                <br><label class="alta" for="myfile">Caratula bancaria (documento pdf, máximo 2MB) *</label><br>
                <input class="entrada" type="file" name="estadocuenta" id="estadocuenta" accept="application/pdf"
                    required><br>

            </div>
            <div class="cajar2">
                <label class="alta" for="myfile">Carta opinión de cumplimiento (calif. Positiva, máximo 2MB)
                    *</label><br>
                <input class="entrada" type="file" name="positiva" id="positiva" accept="application/pdf"
                    required><br><br>
            </div>
            <div class="clearfix"></div>


            <h3 align="CENTER">DATOS DE CONTACTO</h3><br>
            <div class="cajar1">



                <label class="alta">Nombre del representante de ventas *</label><br>
                <input class="entrada" type="text" name="repres_ventas" id="repres_ventas" value="" required><br><br>
                <label class="alta">Teléfono del representante de ventas *</label><br>

                <input class="entrada" type="text" name="tel_repre" id="tel_repre" value="" required maxlength="10"
                    onkeypress="return solonumeros(event)" onpaste="return false"><br><br>
                <label class="alta">Email del representante de ventas * (principal)</label><br>
                <input class="entrada" type="email" name="email_repre" id="email_repre" name="email" required
                    style="text-transform:none"> <br><br><br>




                <label class="alta">Nombre de otro contacto (opcional)</label><br>
                <input class="entrada" type="text" name="otro_contacto" id="otro_contacto" value=""><br><br>
                <label class="alta">Teléfono (opcional)</label><br>
                <input class="entrada" type="text" name="telefono_otro" id="telefono_otro" value="" maxlength="10"
                    onkeypress="return solonumeros(event)" onpaste="return false"><br><br>
                <label class="alta">Email (opcional)</label><br>
                <input class="entrada" type="email" name="email_otro" id="email_otro" name="email"
                    style="text-transform:none"><br>




            </div>
            <div class="cajar2">

                <label class="alta">Nombre del director General *</label><br>
                <input class="entrada" type="text" name="director_general" id="director_general" value=""
                    required><br><br>
                <label class="alta">Teléfono del director General *</label><br>
                <input class="entrada" type="text" name="telefono_dir" id="telefono_dir" value="" maxlength="10"
                    required onkeypress="return solonumeros(event)" onpaste="return false"><br><br>
                <label class="alta">Email del director General *</label><br>
                <input class="entrada" type="email" name="email_dir" id="email_dir" required
                    style="text-transform:none">
                <br><br>


            </div>
            <div class="clearfix"></div>

            <h3 align="CENTER">REFERENCIA CLIENTES</h3>


            <div class="cajar1">

                <h5>Cliente 1</h5>
                <label class="alta">Nombre *</label><br>
                <input class="entrada" type="text" name="nombre1" value="" id="nombre1" required><br><br>
                <label class="alta">Contacto *</label><br>
                <input class="entrada" type="text" name="contacto1" value="" id="contacto1" required><br><br>
                <label class="alta">Teléfono *</label><br>
                <input class="entrada" type="text" name="telefono1" value="" id="telefono1" maxlength="10" required
                    onkeypress="return solonumeros(event)" onpaste="return false"><br>
            </div>

            <div class="cajar2">

                <h5>Cliente 2</h5>
                <label class="alta">Nombre </label><br>
                <input class="entrada" type="text" name="nombre2" id="nombre2" value=""><br><br>
                <label class="alta">Contacto </label><br>
                <input type="text" class="entrada" name="contacto2" id="contacto2" value=""><br><br>
                <label class="alta">Teléfono </label><br>
                <input class="entrada" type="text" name="telefono2" id="telefono2" maxlength="10" value=""
                    onkeypress="return solonumeros(event)" onpaste="return false"><br>

            </div>
            <div class="clearfix"></div>



            <!-- En esta parte va el captcha de google para proteger al formulario de boots -->


            <input type="submit" value="Registrarse" class="btn btn-secondary altaenv" name="submit" id="registrar">
        </form>




    </div>
    <!-- importamos nuestro pie de pagina -->
    <?php
require("footer.php");
?>
    <!-- importamos el documento llamado validar.js que contiene todos los caracteres y condiciones a revisar y validar para darle mas seguridad al formulario
si todo esta en orden se mandara el formulario a validar con php de lo contrario mostrara alertas con los errores cometidos por el usuario  -->
    <script src="../js/validar.js"></script>
    <script src="../js/jquery.min.js"></script>
    
     <script src="https://www.google.com/recaptcha/api.js?render=6Lc5h8AaAAAAAGXJ2fzRU_GYKFasTILt9IbneLe_"></script>
     
     
     
     
     
     
      <script>
    $('#newsletterForm').submit(function(event) {
        event.preventDefault();
        var registrar = $('#registrar').val();
 
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc5h8AaAAAAAGXJ2fzRU_GYKFasTILt9IbneLe_', {action: 'subscribe_newsletter'}).then(function(token) {
                $('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#newsletterForm').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                $('#newsletterForm').unbind('submit').submit();
            });;
        });
  });
  </script>
     
     
     
     
     

</body>



</html>