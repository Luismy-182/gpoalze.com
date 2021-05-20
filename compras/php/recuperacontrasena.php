<!DOCTYPE html>
<html lang="es">
<html>
<!-- cargamos nuestras librerías -->
<head>
    <title>Recupera tu cuenta</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/logo.ico"/>
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
	 <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<!--creamos nuestro formulario, todo esto es código reciclado del documento login.php por lo cual no hay nada 
nuevo, solo se agrego el input de emial, y funciona tanto para recuperar cuentas de compradores como de proveedores oficiales -->
<body class="login">
    <div class="contenido-cuenta">
        <div class="header">
            <h1>Recupera tu cuenta</h1>
        </div>
        <div class="main">
            <form action="validarecuperacontrasena.php" method="POST" class="login">
                <span>
                   <i class="far fa-envelope"></i>
                    <input type="email" placeholder="email representante de ventas" name="email">
                </span><br>
                
                <button type="submit" value="Acceder" class="iniciar-sesion">Recuperar cuenta</button><br>
         <div class="links">
                <br><br><a href="login.php">Iniciar sesión</a><br>
                <a href="registro.php">Registrarme</a><br><br><br>
                </div>
        </div>
    </div>
</body>

</html>