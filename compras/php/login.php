<!DOCTYPE html>
<html lang="es">
<!-- Importamos nuestras librerías que necesitamos y nuestras hojas de estilos -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logo.ico" />
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
    <title>login</title>

</head>
<!-- creamos un body con la clase login para después usar un fondo de pantalla -->

<body class="login">
    <div class="contenido">
        <!-- En nuestro contenedor tendremos un titulo de acceder y un formulario dentro del contenedor, que manda a validar los datos del formulario con la base de datos -->
        <div class="header">
            <h1>Acceder</h1>
        </div>
        <div class="main">
            <form action="validalogin.php" method="POST" class="login">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="RFC O USUARIO" name="rfc">
                </span><br>
                <span>
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="contrasena" name="contrasena">
                </span><br>
                <button type="submit" value="Acceder" class="iniciar-sesion">Iniciar sesión</button><br>
                <div class="links">
                    <br><br><a href="recuperacontrasena.php">Olvidé mi contraseña</a><br>
                    <a href="registro.php">Registrarme</a><br><br><br>

                </div>
        </div>
    </div>
</body>

</html>