<?php
session_start(); //iniciamos o reanudamos la sesión 
require("../conexion/conexion.php"); //importamos conexión
$rfc=$_SESSION['username']; 
if (!isset ($rfc)) {
    header("location:login.php");//si no se ha iniciado sesión nos redirige al login
}
$query="SELECT razon_social FROM altaproveedor where rfc='$rfc'";//ahora que tenemos el rfc procedemos a sacar la razón social mediante una consulta y un while
$resultado=mysqli_query($con,$query);
while ($mostrar=mysqli_fetch_array($resultado)) {
  $razon=$mostrar['razon_social'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<nav class="navbar navbar-carousel navbar-expand-lg navbar-dark bg-dark sticky-top navita">
    <a class="navbar-brand" href="proveedor.php"><?php echo $razon;?></a>
    <!--ahora ya podemos imprimir la razon social en lo alto del nav-->
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
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="documentosp.php"){echo "active";}else{echo "";} ?>"
                    href="documentosp.php"><i class="fas fa-folder-open"></i>VER MI DOCUMENTACIÓN</a>
            </li>
            <!--básicamente dice que si se esta apuntando a si mismo donde el proveedor se encuentra, entonces se inserta la clase active y esto ara que se remarque en donde estamos en el nav-->
            <li class="nav-item">
                <a class="nav-link active" href="cerrar_session.php"><i
                        class="fas fa-sign-out-alt cerrar-sesion"></i>CERRAR SESIÓN</a>
            </li>

        </ul>
    </div>
</nav>

</html>