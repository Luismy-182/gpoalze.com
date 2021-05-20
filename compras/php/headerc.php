<?php
//header comprador, se inicia la sesión después del login y toma el usuario y su tipo (rol, o privilegios)
session_start();
$user=$_SESSION['user']; 
$tipo=$_SESSION['tipo'];
if (!isset ($user)) {
    header("location:login.php");//si no ha iniciado sesión y esta intentando acceder via url, simplemente lo manda al login. de esta forma protegemos toda la seguridad de todo el sitio web
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--cargamos las librerías y estilos css3 -->
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="compras.php">BIENVENIDO <?php echo $user;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="compras.php" || basename($_SERVER['PHP_SELF'])=="comprasus.php" ){echo "active";}else{echo "";} ?>"
                    href="compras.php"><i class="fas fa-shipping-fast"></i>PROVEEDORES</a>
            </li>
            <!-- Básicamente dice, que si se encuentra en su propio archivo.php se agrega la clase active, la cual ya esta predefinida para mostrarse activa en la barra de navegación-->
            <li class="nav-item">
                <a class="nav-link  <?php if (basename($_SERVER['PHP_SELF'])=="prospectos.php"){echo "active";}else{echo "";} ?> "
                    href="prospectos.php"><i class="far fa-handshake"></i>PROSPECTOS</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  <?php if (basename($_SERVER['PHP_SELF'])=="compradores.php" || basename($_SERVER['PHP_SELF'])=="compradoresus.php"){echo "active";}else{echo "";} ?> "
                    href="compradores.php"><i class="fas fa-users"></i>COMPRADORES<span class="sr-only"></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if (basename($_SERVER['PHP_SELF'])=="mensaje-masivo.php" || basename($_SERVER['PHP_SELF'])=="mensaje-masivous.php" ){echo "active";}else{echo "";} ?> "
                    href="mensaje-masivo.php"><i class="fas fa-mail-bulk"></i>MENSAJE MASIVO</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="cerrar_session.php"><i class="fas fa-sign-out-alt cerrar-sesion"></i>Cerrar
                    sesión<span class="sr-only"></span></a>
            </li>
        </ul>
    </div>
</nav>


</html>