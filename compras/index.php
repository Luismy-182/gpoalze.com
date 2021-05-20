<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Proveedores</title>
</head>


<!-- Creamos nuestro body con la clase .index para después en css usar un fondo de pantalla y ajustar sus propiedades -->

<body class="index">
    <!-- Importáremos nuestra barra de navegación -->
    <?php 
    require("php/header.php");
    ?>
    <!-- creamos nuestro contenedor con el nombre cuerpo-index donde contendrá nuestro article con los links a las otras paginas web -->
    <div class="cuerpo-index">
        <article class="preguntas">
            <p>¿Ya tienes cuenta?</p><a href="php/login.php">Iniciar sesión</a>
            <br><br>
            <p>¿Deseas ser uno de nuestros proveedores?</p>
            <a href="php/registro.php">Regístrate</a>
        </article>
    </div>


    <!-- importamos nuestro footer.php para generar nuestro pie de pagina-->
    <?php
require("php/footer-index.php");
?>

    <!-- AL  final, por buenas practicas de programación antes del /body, insertamos nuestros JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>



</html>