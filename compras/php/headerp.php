<?php

//header del proveedor, inicia su sesión después del login, y se toma su rfc para mostrarse en pantalla
session_start();
require("../conexion/conexion.php");
$rfc=$_SESSION['username']; 
if (!isset ($rfc)) {
    header("location:login.php");//si no a iniciado sesión y quiere acceder por url, simplemente no lo deja cargar la pagina y lo manda al login
}
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'"; //ahora que tenemos el rfc de proveedor, recorremos la tabla y traemos la razón social
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social']; //le damos una variable para poder sacarla del while
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top navita">
    <a class="navbar-brand" href="proveedor.php"><?php echo $razon;?></a>
    <!--Muestra la razon social, aqui imprimimos la variable -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="subirdocumentosp.php"){echo "active";}else{echo "";} ?>"
                    href="subirdocumentosp.php"><i class="fas fa-file-upload"></i>SUBIR DOCUMENTACIÓN<span
                        class="sr-only"></span></a>
            </li>
            <!-- Básicamente dice, que si se encuentra en su propio archivo.php se agrega la clase active, la cual ya esta predefinida para mostrarse activa en la barra de navegación-->
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="documentosp.php"){echo "active";}else{echo "";} ?>"
                    href="documentosp.php"><i class="fas fa-folder-open"></i>VER MI DOCUMENTACIÓN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="cerrar_session.php"><i
                        class="fas fa-sign-out-alt cerrar-sesion"></i>CERRAR SESIÓN</a>
            </li>

        </ul>
    </div>
</nav>

</html>